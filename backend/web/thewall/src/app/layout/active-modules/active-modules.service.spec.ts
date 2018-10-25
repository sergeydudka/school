import { TestBed } from '@angular/core/testing';

import { ActiveModulesService } from './active-modules.service';

describe('ActiveModulesService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ActiveModulesService = TestBed.get(ActiveModulesService);
    expect(service).toBeTruthy();
  });
});
