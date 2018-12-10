import { TestBed } from '@angular/core/testing';

import { StatefulService } from './stateful.service';

describe('StatefulService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: StatefulService = TestBed.get(StatefulService);
    expect(service).toBeTruthy();
  });
});
