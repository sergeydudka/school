import { InjectionToken } from '@angular/core';
import { ComponentOverlayConfig } from './overlay-config';

/** Injection token that can be used to specify default component overlay options. */
export const COMPONENT_OVERLAY_DEFAULT_OPTIONS = new InjectionToken<
  ComponentOverlayConfig
>('component-overlay-default-options');

export const COMPONENT_OVERLAY_LOADER_OPTIONS = new InjectionToken(
  'component-overlay-loader-options'
);
