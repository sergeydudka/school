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
        background: rgba(0, 0, 0, 0.75);
        padding: 15px;
        border-radius: 15px;
      }

      p {
        font-family: Roboto, "Helvetica Neue", sans-serif;
        margin-top: 15px;
        color: #fff;
        margin: 10px 0 0;
      }
    `
  ]
})
export class OverlayComponent {
  color = 'primary';
  diameter = 50;

  constructor(
    @Inject(COMPONENT_OVERLAY_LOADER_OPTIONS)
    public options: OverlaycomponentOptions
  ) {
    if (options.color) {
      this.color = options.color;
    }

    if (options.diameter) {
      this.diameter = options.diameter;
    }
  }
}
