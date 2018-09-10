import { TestBed, inject } from '@angular/core/testing';

import { YiiCrudService } from './yii-crud.service';

describe('YiiCrudService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [YiiCrudService]
    });
  });

  it('should be created', inject([YiiCrudService], (service: YiiCrudService) => {
    expect(service).toBeTruthy();
  }));
});
