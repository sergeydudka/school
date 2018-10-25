export interface ModuleConfig {
  title: string;
  angularModule: string;
  category: string;
  module: string;
  uniqueId: string;
  link: string;
  addToTabs: boolean;
  currentUrl?: string;
  [key: string]: any;
}
