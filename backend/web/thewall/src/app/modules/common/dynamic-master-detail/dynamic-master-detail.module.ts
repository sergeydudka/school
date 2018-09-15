// angular imports
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

// module specific imports
import { DynamicMasterDetailRoutingModule } from './dynamic-master-detail-routing.module';
import { MasterDetailService } from './master-detail.service';
import { DynamicMasterDetailComponent } from './dynamic-master-detail.component';

@NgModule({
  imports: [CommonModule, DynamicMasterDetailRoutingModule],
  declarations: [DynamicMasterDetailComponent],
  providers: [MasterDetailService]
})
export class DynamicMasterDetailModule {}
