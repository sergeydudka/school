import { DynamicGridModule } from './dynamic-grid.module';

describe('DynamicGridModule', () => {
  let dynamicGridModule: DynamicGridModule;

  beforeEach(() => {
    dynamicGridModule = new DynamicGridModule();
  });

  it('should create an instance', () => {
    expect(dynamicGridModule).toBeTruthy();
  });
});
