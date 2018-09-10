import { TestBed, inject } from '@angular/core/testing';

import { GridBuilderService } from './grid-builder.service';

describe('GridBuilderService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [GridBuilderService]
    });
  });

  it('should be created', inject([GridBuilderService], (service: GridBuilderService) => {
    expect(service).toBeTruthy();
  }));
});
