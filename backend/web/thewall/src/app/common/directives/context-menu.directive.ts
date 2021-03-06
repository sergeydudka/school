import {
  Directive,
  Input,
  Optional,
  OnDestroy,
  Self,
  ViewContainerRef,
  ElementRef,
  Output,
  EventEmitter,
  Inject
} from '@angular/core';

import {
  OverlayRef,
  Overlay,
  FlexibleConnectedPositionStrategy,
  HorizontalConnectionPos,
  VerticalConnectionPos,
  OverlayConfig,
  ScrollStrategy
} from '@angular/cdk/overlay';
import { coerceCssPixelValue } from '@angular/cdk/coercion';
import { FocusOrigin, FocusMonitor } from '@angular/cdk/a11y';
import { Directionality, Direction } from '@angular/cdk/bidi';
import { TemplatePortal } from '@angular/cdk/portal';
import {
  MatMenuPanel,
  MatMenu,
  MatMenuItem,
  MAT_MENU_SCROLL_STRATEGY,
  MenuPositionX,
  MenuPositionY
} from '@angular/material';

import { Subscription, of as observableOf, merge } from 'rxjs';
import { filter, take, takeUntil } from 'rxjs/operators';

/** Default top padding of the menu panel. */
export const MENU_PANEL_TOP_PADDING = 8;

/**
 * Special directive that switches uxmatContextMenu
 * to global positioning strategy
 */
@Directive({
  selector: '[uxmatContextMenuPositionGlobal]'
})
export class ContextMenuDirectivePositionGlobal {}

@Directive({
  selector: '[uxmatContextMenu]',
  host: {
    'aria-haspopup': 'true',
    '[attr.aria-expanded]': 'menuOpen || null',
    '(contextmenu)': '_handleContextMenu($event)',
    '(document:contextmenu)': '_handleDocumentContextMenu($event)'
  }
  // exportAs: 'uxmatContextMenu'
})
export class ContextMenuDirective implements OnDestroy {
  private _portal: TemplatePortal;
  private _overlayRef: OverlayRef | null = null;
  private _menuOpen = false;
  private _closeSubscription = Subscription.EMPTY;
  private _hoverSubscription = Subscription.EMPTY;
  private _menuCloseSubscription = Subscription.EMPTY;
  private _scrollStrategy: () => ScrollStrategy;
  private _preventBrowserContextMenu = false;

  /**
   * Attibutes required for global positioning
   */
  private _isGlobalPositioning;
  private globalOffsetLeft: number;
  private globalOffsetTop: number;

  // Tracking input type is necessary so it's possible to only auto-focus
  // the first item of the list when the menu is opened via the keyboard
  _openedBy: 'mouse' | 'touch' | null = null;

  @Input('uxmatContextMenu')
  get menu() {
    return this._menu;
  }
  set menu(menu: MatMenuPanel) {
    if (menu === this._menu) {
      return;
    }

    this._menu = menu;
  }
  private _menu: MatMenuPanel;

  /** Data to be passed along to any lazily-rendered content. */
  @Input('matMenuTriggerData')
  menuData: any;

  /** Event emitted when the associated menu is opened. */
  @Output()
  readonly menuOpened: EventEmitter<void> = new EventEmitter<void>();

  /** Event emitted when the associated menu is closed. */
  @Output()
  readonly menuClosed: EventEmitter<void> = new EventEmitter<void>();

  constructor(
    private _overlay: Overlay,
    private _element: ElementRef<HTMLElement>,
    private _viewContainerRef: ViewContainerRef,
    @Inject(MAT_MENU_SCROLL_STRATEGY) scrollStrategy: any,
    @Optional() private _parentMenu: MatMenu,
    @Optional()
    @Self()
    private _menuItemInstance: MatMenuItem,
    @Optional() private _dir: Directionality,
    @Optional() isGlobalPositioning: ContextMenuDirectivePositionGlobal,
    private _focusMonitor?: FocusMonitor
  ) {
    this._scrollStrategy = scrollStrategy;
    this._isGlobalPositioning = isGlobalPositioning;
  }

  ngOnDestroy() {
    if (this._overlayRef) {
      this._overlayRef.dispose();
      this._overlayRef = null;
    }

    // this._element.nativeElement.removeEventListener('touchstart', this._handleTouchStart, passiveEventListenerOptions);

    this._cleanUpSubscriptions();
  }

  /** Whether the menu is open. */
  get menuOpen(): boolean {
    return this._menuOpen;
  }

  /** The text direction of the containing app. */
  get dir(): Direction {
    return this._dir && this._dir.value === 'rtl' ? 'rtl' : 'ltr';
  }

  /** Toggles the menu between the open and closed states. */
  toggleMenu(): void {
    return this._menuOpen ? this.closeMenu() : this.openMenu();
  }

  /** Opens the menu. */
  openMenu(): void {
    if (this._menuOpen) {
      return;
    }

    this._menuCloseSubscription.unsubscribe();

    if (this.menu) {
      this._menuCloseSubscription = this.menu.close
        .asObservable()
        .subscribe(reason => {
          this._destroyMenu();

          // If a click closed the menu, we should close the entire chain of nested menus.
          if ((reason === 'click' || reason === 'tab') && this._parentMenu) {
            this._parentMenu.closed.emit(reason);
          }
        });
    }

    const overlayRef = this._createOverlay();
    if (!this._isGlobalPositioning) {
      this._setPosition(overlayRef.getConfig()
        .positionStrategy as FlexibleConnectedPositionStrategy);
    }
    overlayRef.attach(this._getPortal());

    if (this.menu.lazyContent) {
      this.menu.lazyContent.attach(this.menuData);
    }

    this._closeSubscription = this._menuClosingActions().subscribe(() =>
      this.closeMenu()
    );
    this._initMenu();

    if (this.menu instanceof MatMenu) {
      this.menu._startAnimation();
    }
  }

  /** Closes the menu. */
  closeMenu(): void {
    this.menu.close.emit();
  }

  /** Whether the menu triggers a sub-menu or a top-level one. */
  triggersSubmenu(): boolean {
    return !!(this._menuItemInstance && this._parentMenu);
  }

  /**
   * Focuses the menu trigger.
   * @param origin Source of the menu trigger's focus.
   */
  focus(origin: FocusOrigin = 'program') {
    if (this._focusMonitor) {
      this._focusMonitor.focusVia(this._element, origin);
    } else {
      this._element.nativeElement.focus();
    }
  }

  /** Closes the menu and does the necessary cleanup. */
  private _destroyMenu() {
    if (!this._overlayRef || !this._menuOpen) {
      return;
    }

    const menu = this.menu;

    this._closeSubscription.unsubscribe();
    this._overlayRef.detach();

    if (menu instanceof MatMenu) {
      menu._resetAnimation();

      if (menu.lazyContent) {
        // Wait for the exit animation to finish before detaching the content.
        menu._animationDone
          .pipe(
            filter(event => event.toState === 'void'),
            take(1),
            // Interrupt if the content got re-attached.
            takeUntil(menu.lazyContent._attached)
          )
          .subscribe(() => menu.lazyContent!.detach(), undefined, () => {
            // No matter whether the content got re-attached, reset the menu.
            this._resetMenu();
          });
      } else {
        this._resetMenu();
      }
    } else {
      this._resetMenu();

      if (menu.lazyContent) {
        menu.lazyContent.detach();
      }
    }
  }

  /**
   * This method resets the menu when it's closed, most importantly restoring
   * focus to the menu trigger if the menu was opened via the keyboard.
   */
  private _resetMenu(): void {
    this._setIsMenuOpen(false);

    // We should reset focus if the user is navigating using a keyboard or
    // if we have a top-level trigger which might cause focus to be lost
    // when clicking on the backdrop.
    if (!this._openedBy) {
      // Note that the focus style will show up both for `program` and
      // `keyboard` so we don't have to specify which one it is.
      this.focus();
    } else if (!this.triggersSubmenu()) {
      this.focus(this._openedBy);
    }

    this._openedBy = null;
  }

  /** Cleans up the active subscriptions. */
  private _cleanUpSubscriptions(): void {
    this._closeSubscription.unsubscribe();
    this._hoverSubscription.unsubscribe();
  }

  /** Handles click events on the trigger. */
  private _handleContextMenu(event: MouseEvent): void {
    event.stopImmediatePropagation();
    event.preventDefault();
    event.stopPropagation();

    this.globalOffsetTop = event.pageY;
    this.globalOffsetLeft = event.pageX;

    this.toggleMenu();

    // hack prevenst browser context menu which is shown simetimes
    this._preventBrowserContextMenu = true;
    setTimeout(() => {
      this._preventBrowserContextMenu = false;
    }, 100);
  }

  private _handleDocumentContextMenu(event: MouseEvent): void {
    if (this._preventBrowserContextMenu) event.preventDefault();
  }

  /**
   * This method builds the configuration object needed to create the overlay, the OverlayState.
   * @returns OverlayConfig
   */
  private _getOverlayConfig(): OverlayConfig {
    let positionStrategy;

    if (this._isGlobalPositioning) {
      positionStrategy = this._overlay
        .position()
        .global()
        .left(coerceCssPixelValue(this.globalOffsetLeft))
        .top(coerceCssPixelValue(this.globalOffsetTop));
    } else {
      positionStrategy = this._overlay
        .position()
        .flexibleConnectedTo(this._element)
        .withLockedPosition()
        .withTransformOriginOn('.mat-menu-panel');
    }

    return new OverlayConfig({
      positionStrategy,
      hasBackdrop:
        this.menu.hasBackdrop == null
          ? !this.triggersSubmenu()
          : this.menu.hasBackdrop,
      backdropClass:
        this.menu.backdropClass || 'cdk-overlay-transparent-backdrop',
      scrollStrategy: this._scrollStrategy(),
      direction: this._dir
    });
  }

  /**
   * This method creates the overlay from the provided menu's template and saves its
   * OverlayRef so that it can be attached to the DOM when openMenu is called.
   */
  private _createOverlay(): OverlayRef {
    if (!this._overlayRef) {
      const config = this._getOverlayConfig();

      if (!this._isGlobalPositioning) {
        this._subscribeToPositions(
          config.positionStrategy as FlexibleConnectedPositionStrategy
        );
      }
      this._overlayRef = this._overlay.create(config);

      // Consume the `keydownEvents` in order to prevent them from going to another overlay.
      // Ideally we'd also have our keyboard event logic in here, however doing so will
      // break anybody that may have implemented the `MatMenuPanel` themselves.
      this._overlayRef.keydownEvents().subscribe();
    }

    return this._overlayRef;
  }

  /**
   * This method sets the menu state to open and focuses the first item if
   * the menu was opened via the keyboard.
   */
  private _initMenu(): void {
    this.menu.parentMenu = this.triggersSubmenu()
      ? this._parentMenu
      : undefined;
    this.menu.direction = this.dir;
    this._setMenuElevation();
    this._setIsMenuOpen(true);
    this.menu.focusFirstItem(this._openedBy || 'program');
  }

  /** Updates the menu elevation based on the amount of parent menus that it has. */
  private _setMenuElevation(): void {
    if (this.menu.setElevation) {
      let depth = 0;
      let parentMenu = this.menu.parentMenu;

      while (parentMenu) {
        depth++;
        parentMenu = parentMenu.parentMenu;
      }

      this.menu.setElevation(depth);
    }
  }

  // set state rather than toggle to support triggers sharing a menu
  private _setIsMenuOpen(isOpen: boolean): void {
    this._menuOpen = isOpen;
    this._menuOpen ? this.menuOpened.emit() : this.menuClosed.emit();

    if (this.triggersSubmenu()) {
      this._menuItemInstance._highlighted = isOpen;
    }
  }

  /**
   * Sets the appropriate positions on a position strategy
   * so the overlay connects with the trigger correctly.
   * @param positionStrategy Strategy whose position to update.
   */
  private _setPosition(positionStrategy: FlexibleConnectedPositionStrategy) {
    let [originX, originFallbackX]: HorizontalConnectionPos[] =
      this.menu.xPosition === 'before' ? ['end', 'start'] : ['start', 'end'];

    const [overlayY, overlayFallbackY]: VerticalConnectionPos[] =
      this.menu.yPosition === 'above' ? ['bottom', 'top'] : ['top', 'bottom'];

    let [originY, originFallbackY] = [overlayY, overlayFallbackY];
    let [overlayX, overlayFallbackX] = [originX, originFallbackX];
    let offsetY = 0;

    if (this.triggersSubmenu()) {
      // When the menu is a sub-menu, it should always align itself
      // to the edges of the trigger, instead of overlapping it.
      overlayFallbackX = originX =
        this.menu.xPosition === 'before' ? 'start' : 'end';
      originFallbackX = overlayX = originX === 'end' ? 'start' : 'end';
      offsetY =
        overlayY === 'bottom'
          ? MENU_PANEL_TOP_PADDING
          : -MENU_PANEL_TOP_PADDING;
    } else if (!this.menu.overlapTrigger) {
      originY = overlayY === 'top' ? 'bottom' : 'top';
      originFallbackY = overlayFallbackY === 'top' ? 'bottom' : 'top';
    }

    positionStrategy.withPositions([
      { originX, originY, overlayX, overlayY, offsetY },
      {
        originX: originFallbackX,
        originY,
        overlayX: overlayFallbackX,
        overlayY,
        offsetY
      },
      {
        originX,
        originY: originFallbackY,
        overlayX,
        overlayY: overlayFallbackY,
        offsetY: -offsetY
      },
      {
        originX: originFallbackX,
        originY: originFallbackY,
        overlayX: overlayFallbackX,
        overlayY: overlayFallbackY,
        offsetY: -offsetY
      }
    ]);
  }

  /**
   * Listens to changes in the position of the overlay and sets the correct classes
   * on the menu based on the new position. This ensures the animation origin is always
   * correct, even if a fallback position is used for the overlay.
   */
  private _subscribeToPositions(
    position: FlexibleConnectedPositionStrategy
  ): void {
    if (this.menu.setPositionClasses) {
      position.positionChanges.subscribe(change => {
        const posX: MenuPositionX =
          change.connectionPair.overlayX === 'start' ? 'after' : 'before';
        const posY: MenuPositionY =
          change.connectionPair.overlayY === 'top' ? 'below' : 'above';

        this.menu.setPositionClasses!(posX, posY);
      });
    }
  }

  /** Returns a stream that emits whenever an action that should close the menu occurs. */
  private _menuClosingActions() {
    const backdrop = this._overlayRef!.backdropClick();
    const detachments = this._overlayRef!.detachments();
    const parentClose = this._parentMenu
      ? this._parentMenu.closed
      : observableOf();
    const hover = this._parentMenu
      ? this._parentMenu._hovered().pipe(
          filter(active => active !== this._menuItemInstance),
          filter(() => this._menuOpen)
        )
      : observableOf();

    return merge(backdrop, parentClose, hover, detachments);
  }

  /** Gets the portal that should be attached to the overlay. */
  private _getPortal(): TemplatePortal {
    // Note that we can avoid this check by keeping the portal on the menu panel.
    // While it would be cleaner, we'd have to introduce another required method on
    // `MatMenuPanel`, making it harder to consume.
    if (!this._portal || this._portal.templateRef !== this.menu.templateRef) {
      this._portal = new TemplatePortal(
        this.menu.templateRef,
        this._viewContainerRef
      );
    }

    return this._portal;
  }
}
