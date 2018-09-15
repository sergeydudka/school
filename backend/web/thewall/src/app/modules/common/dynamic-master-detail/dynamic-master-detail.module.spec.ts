import { DynamicMasterDetailModule } from './dynamic-master-detail.module';

describe('DynamicMasterDetailModule', () => {
  let dynamicMasterDetailModule: DynamicMasterDetailModule;

  beforeEach(() => {
    dynamicMasterDetailModule = new DynamicMasterDetailModule();
  });

  it('should create an instance', () => {
    expect(dynamicMasterDetailModule).toBeTruthy();
  });
});
