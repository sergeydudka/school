import { NgModule } from '@angular/core';

import { MatProgressSpinnerModule } from '@angular/material/progress-spinner';

import { OverlayComponent } from './overlay.component';
import { OverlayService } from './overlay.service';

import { ComponentConnectedPoisitionStrategy } from './component-connected-position-strategy';

@NgModule({
  imports: [MatProgressSpinnerModule],
  declarations: [OverlayComponent],
  providers: [OverlayService, ComponentConnectedPoisitionStrategy],
  entryComponents: [OverlayComponent],
})
export class ComponentOverlayModule {}
