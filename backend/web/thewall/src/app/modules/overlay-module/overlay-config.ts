import { ElementRef } from '@angular/core';

export class ComponentOverlayConfig {
  /** Custom class to add to the overlay pane. */
  panelClass?: string;

  /** Custom class to add to the backdrop element. */
  backdropClass?: string;

  /** Reference to element that will be used as progress element */
  target?: ElementRef;

  /** Compnent to be used as loader */
  component?: any;

  /** Loader component parameters */
  loaderConfig?: {
    [key: string]: any;
  };
}
