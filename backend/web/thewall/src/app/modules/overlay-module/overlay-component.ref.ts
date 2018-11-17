import { OverlayRef } from '@angular/cdk/overlay';

export class OverlayComponentRef {
  constructor(private overlayRef: OverlayRef) {}

  hide(): void {
    this.overlayRef.dispose();
  }
}
