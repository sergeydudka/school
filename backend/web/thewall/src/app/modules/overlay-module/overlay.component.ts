import { Component, Inject } from '@angular/core';
import { COMPONENT_OVERLAY_LOADER_OPTIONS } from './overlay-component.tokens';

interface OverlaycomponentOptions {
  color: string;
  diameter: number;
}

@Component({
  selector: 'overlay-component',
  templateUrl: 'overlay-component.html',
  styles: [
    `
      :host {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }
    `
  ]
})
export class OverlayComponent {
  color = 'accent';
  diameter = 50;

  constructor(@Inject(COMPONENT_OVERLAY_LOADER_OPTIONS) public options: OverlaycomponentOptions) {
    if (options.color) {
      this.color = options.color;
    }

    if (options.diameter) {
      this.diameter = options.diameter;
    }
  }
}
