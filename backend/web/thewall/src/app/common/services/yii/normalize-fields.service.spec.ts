import { TestBed } from '@angular/core/testing';

import { NormalizeFieldsService } from './normalize-fields.service';

describe('NormalizeFieldsService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: NormalizeFieldsService = TestBed.get(NormalizeFieldsService);
    expect(service).toBeTruthy();
  });
});
