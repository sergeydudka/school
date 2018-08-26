import { BrowseGridModule } from './browse-grid.module';

describe('BrowseGridModule', () => {
  let browseGridModule: BrowseGridModule;

  beforeEach(() => {
    browseGridModule = new BrowseGridModule();
  });

  it('should create an instance', () => {
    expect(browseGridModule).toBeTruthy();
  });
});
