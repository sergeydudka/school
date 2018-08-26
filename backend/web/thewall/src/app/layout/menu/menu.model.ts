export interface Action {
  checkAccess: string; // should be array
  class: string;
  modelClass: string;
  scenario: string;
}
export interface SubModule {
  actions: {
    [propName: string]: Action;
  };
  class: string;
  label: string;
  url: string;
}
export interface Module {
  [propName: string]: SubModule;
}
export interface Menu {
  result: {
    list: {
      [propName: string]: Module;
    };
  };
}

export interface MenuNode {
  children?: MenuNode[];
  title: string;
  url?: string;
}
