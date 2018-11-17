import { Injectable, InjectionToken, Optional, Inject, Injector, ComponentRef, ElementRef } from '@angular/core';

import { Overlay, OverlayConfig, OverlayRef } from '@angular/cdk/overlay';
import { ComponentPortal, PortalInjector } from '@angular/cdk/portal';

import { OverlayComponent } from './overlay.component';

// custom position strategy
import { ComponentConnectedPoisitionStrategy } from './component-connected-position-strategy';
import { ComponentOverlayConfig } from './overlay-config';
import { OverlayComponentRef } from './overlay-component.ref';

import { COMPONENT_OVERLAY_DEFAULT_OPTIONS, COMPONENT_OVERLAY_LOADER_OPTIONS } from './overlay-component.tokens';

@Injectable()
export class OverlayService {
  private overlaysMap: Map<ElementRef | HTMLElement, OverlayComponentRef> = new Map();

  constructor(
    private _overlay: Overlay,
    private _injector: Injector,
    private _posStrategy: ComponentConnectedPoisitionStrategy,
    @Optional()
    @Inject(COMPONENT_OVERLAY_DEFAULT_OPTIONS)
    private _defaultOptions: ComponentOverlayConfig
  ) {}

  show(config: ComponentOverlayConfig = { loaderConfig: {} }): OverlayComponentRef {
    // Override default configuration
    const dialogConfig = _mergeConfigs(
      {
        loaderConfig: {},
        ...(this._defaultOptions || new ComponentOverlayConfig())
      },
      config
    );

    // if user didn't specified component to use as overlay
    // use default one
    if (!dialogConfig.component) {
      dialogConfig.component = OverlayComponent;
    }

    // Returns an OverlayRef which is a PortalHost
    const overlayRef = this._createOverlay(dialogConfig);

    const overlayComponentRef = new OverlayComponentRef(overlayRef);

    this._attachOverlayContainer(overlayRef, dialogConfig, overlayComponentRef);

    this.overlaysMap.set(config.target || document.body, overlayComponentRef);

    return overlayComponentRef;
  }

  hide(config: ComponentOverlayConfig) {
    const target = config.target || document.body;

    if (!this.overlaysMap.has(target)) {
      console.warn(`Attemp to hide nonexisting overlay for ${target}`);
      return;
    }

    this.overlaysMap.get(target).hide();
    this.overlaysMap.delete(target);
  }

  /**
   * Creates the overlay into which the loding component will be loaded.
   * @param config The overlay loader configuration.
   * @returns A promise resolving to the OverlayRef for the created overlay.
   */
  private _createOverlay(config: ComponentOverlayConfig): OverlayRef {
    const overlayConfig = this._getOverlayConfig(config);

    return this._overlay.create(overlayConfig);
  }

  /**
   * Creates an overlay config from a loader config.
   * @param config The loader configuration.
   * @returns The overlay configuration.
   */
  private _getOverlayConfig(config: ComponentOverlayConfig): OverlayConfig {
    const positionStrategy = this._posStrategy.setTarget(config.target);

    const overlayConfig = new OverlayConfig({
      hasBackdrop: true,
      backdropClass: config.backdropClass,
      panelClass: config.panelClass,
      scrollStrategy: this._overlay.scrollStrategies.reposition(),
      positionStrategy
    });

    return overlayConfig;
  }

  private _attachOverlayContainer(
    overlayRef: OverlayRef,
    config: ComponentOverlayConfig,
    overlayComponentRef: OverlayComponentRef
  ) {
    const injector = this._createInjector(config, overlayComponentRef);

    // Create ComponentPortal that can be attached to a PortalHost
    const containerPortal = new ComponentPortal(config.component, null, injector);

    // Attach ComponentPortal to PortalHost
    const containerRef = overlayRef.attach(containerPortal);

    return containerRef.instance;
  }

  private _createInjector(config: ComponentOverlayConfig, overlayComponentRef: OverlayComponentRef) {
    const injectionTokens = new WeakMap();

    // injectionTokens.set(OverlayComponentRef, overlayComponentRef);
    injectionTokens.set(COMPONENT_OVERLAY_LOADER_OPTIONS, config.loaderConfig);

    return new PortalInjector(this._injector, injectionTokens);
  }
}

function _mergeConfigs(defaults?: ComponentOverlayConfig, config?: ComponentOverlayConfig): ComponentOverlayConfig {
  return { ...defaults, ...config };
}
