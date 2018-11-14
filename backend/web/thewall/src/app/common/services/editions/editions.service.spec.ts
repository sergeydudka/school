import { TestBed } from '@angular/core/testing';

import { EditionsService } from './editions.service';

describe('EditionsService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: EditionsService = TestBed.get(EditionsService);
    expect(service).toBeTruthy();
  });
});
