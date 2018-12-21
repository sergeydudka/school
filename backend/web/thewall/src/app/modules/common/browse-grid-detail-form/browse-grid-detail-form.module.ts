import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { BrowseGridDetailFormRoutingModule } from './browse-grid-detail-form-routing.module';
import { BrowseGridDetailFormComponent } from './browse-grid-detail-form.component';
import { UxrouterOutlet } from 'src/app/common/uxrouter-outlet/uxrouter-outlet';

@NgModule({
  imports: [CommonModule, BrowseGridDetailFormRoutingModule],
  declarations: [BrowseGridDetailFormComponent, UxrouterOutlet]
})
export class BrowseGridDetailFormModule {}
