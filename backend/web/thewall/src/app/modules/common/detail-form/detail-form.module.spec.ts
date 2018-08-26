import { DetailFormModule } from './detail-form.module';

describe('DetailFormModule', () => {
  let detailFormModule: DetailFormModule;

  beforeEach(() => {
    detailFormModule = new DetailFormModule();
  });

  it('should create an instance', () => {
    expect(detailFormModule).toBeTruthy();
  });
});
