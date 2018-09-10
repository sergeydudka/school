import { TestBed, inject } from '@angular/core/testing';

import { CrudBaseService } from './crud-base.service';

describe('CrudBaseService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [CrudBaseService]
    });
  });

  it('should be created', inject([CrudBaseService], (service: CrudBaseService) => {
    expect(service).toBeTruthy();
  }));
});
