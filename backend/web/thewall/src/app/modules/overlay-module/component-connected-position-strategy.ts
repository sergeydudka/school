import { ElementRef, Injectable } from '@angular/core';

import { Subscription } from 'rxjs';

import { PositionStrategy } from '@angular/cdk/overlay';
import { ViewportRuler } from '@angular/cdk/scrolling';
import { coerceCssPixelValue } from '@angular/cdk/coercion';
import { Platform } from '@angular/cdk/platform';

/** Class to be added to the overlay bounding box. */
const boundingBoxClass = 'cdk-overlay-connected-position-bounding-box';

@Injectable()
export class ComponentConnectedPoisitionStrategy implements PositionStrategy {
  /** The overlay to which this strategy is attached. */
  private _overlayRef: any; /* import('f:/Angular2/overlay-module/node_modules/@angular/cdk/overlay/typings/overlay-reference').OverlayReference; */

  /** Optional target element that should be overlayed. */
  private _target: HTMLElement;

  /** Cached target dimensions */
  private _targetRect: ClientRect;

  /** Whether the strategy has been disposed of already. */
  private _isDisposed: boolean;

  /** Subscription to viewport size changes. */
  private _resizeSubscription = Subscription.EMPTY;

  /**
   * Parent element for the overlay panel used to constrain the overlay panel's size to fit
   * within the viewport.
   */
  private _boundingBox: HTMLElement | null;

  constructor(
    private _viewportRuler: ViewportRuler,
    private _platform?: Platform
  ) {}

  /**
   * Specifies target element for overlay
   *
   * @param target element that should be overlayed
   */
  setTarget(target: ElementRef | HTMLElement) {
    this._target = target instanceof ElementRef ? target.nativeElement : target;

    return this;
  }

  /** Attaches this position strategy to an overlay. */
  attach(overlayRef: any): void {
    overlayRef.hostElement.classList.add(boundingBoxClass);

    this._isDisposed = false;

    this._overlayRef = overlayRef;

    this._boundingBox = overlayRef.hostElement;

    this._resizeSubscription.unsubscribe();
    this._resizeSubscription = this._viewportRuler.change().subscribe(() => {
      this.apply();
    });
  }

  /**
   * Updates the position of the overlay element, and it's backdrop, if active
   *
   * @docs-private
   */
  apply(): void {
    if (this._isDisposed || (this._platform && !this._platform.isBrowser)) {
      return;
    }

    if (this._target) {
      this._targetRect = this._target.getBoundingClientRect();
    }

    this._setOverlayElementAndBackdropStyles();
  }

  detach?(): void {
    this._resizeSubscription.unsubscribe();
  }

  /** Cleanup after the element gets destroyed. */
  dispose(): void {
    if (this._isDisposed) {
      return;
    }

    this._isDisposed = true;
  }

  /** Sets positioning styles to the overlay element. */
  private _setOverlayElementAndBackdropStyles(): void {
    let styles: CSSStyleDeclaration;

    // if we have target component, position overlay over it
    if (this._targetRect) {
      styles = {
        top: coerceCssPixelValue(this._targetRect.top),
        left: coerceCssPixelValue(this._targetRect.left),
        width: coerceCssPixelValue(this._targetRect.width),
        height: coerceCssPixelValue(this._targetRect.height)
      } as CSSStyleDeclaration;

      // otherwise overlay the screen
    } else {
      styles = {
        top: '0px',
        left: '0px',
        width: '100%',
        height: '100%'
      } as CSSStyleDeclaration;
    }

    if (this._overlayRef.backdropElement) {
      extendStyles(this._overlayRef.backdropElement.style, styles);
    }

    extendStyles(this._boundingBox.style, styles);
  }
}

// helper function to apply styles to component
function extendStyles(
  dest: CSSStyleDeclaration,
  source: CSSStyleDeclaration
): CSSStyleDeclaration {
  for (const key in source) {
    if (source.hasOwnProperty(key)) {
      dest[key] = source[key];
    }
  }

  return dest;
}
