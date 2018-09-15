import { TestBed, inject } from '@angular/core/testing';

import { MasterDetailService } from './master-detail.service';

describe('MasterDetailService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [MasterDetailService]
    });
  });

  it('should be created', inject([MasterDetailService], (service: MasterDetailService) => {
    expect(service).toBeTruthy();
  }));
});
