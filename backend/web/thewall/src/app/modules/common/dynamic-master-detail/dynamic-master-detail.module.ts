// angular imports
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

// module specific imports
import { DynamicMasterDetailRoutingModule } from './dynamic-master-detail-routing.module';
import { MasterDetailService } from './master-detail.service';
import { DynamicMasterDetailComponent } from './dynamic-master-detail.component';
import { RouteReuseStrategy } from '@angular/router';
import { CustomDetachReuseRouterStrategy } from '../../../common/route-reuse-strategies/custom-detach-reuse-strategy';

@NgModule({
  imports: [CommonModule, DynamicMasterDetailRoutingModule],
  declarations: [DynamicMasterDetailComponent],
  providers: [
    {
      provide: RouteReuseStrategy,
      useClass: CustomDetachReuseRouterStrategy
    },
    MasterDetailService
  ]
})
export class DynamicMasterDetailModule {}
