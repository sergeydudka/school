import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { BrowseGridDetailFormRoutingModule } from './browse-grid-detail-form-routing.module';
import { BrowseGridDetailFormComponent } from './browse-grid-detail-form.component';

@NgModule({
  imports: [CommonModule, BrowseGridDetailFormRoutingModule],
  declarations: [BrowseGridDetailFormComponent]
})
export class BrowseGridDetailFormModule {}
