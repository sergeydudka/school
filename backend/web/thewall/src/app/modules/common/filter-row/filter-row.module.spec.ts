import { FilterRowModule } from './filter-row.module';

describe('FilterRowModule', () => {
  let filterRowModule: FilterRowModule;

  beforeEach(() => {
    filterRowModule = new FilterRowModule();
  });

  it('should create an instance', () => {
    expect(filterRowModule).toBeTruthy();
  });
});
