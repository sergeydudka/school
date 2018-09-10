import { TestBed, inject } from "@angular/core/testing";

import { FormBuilderService } from "./form.service";

describe("FormBuilderService", () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [FormBuilderService]
    });
  });

  it("should be created", inject(
    [FormBuilderService],
    (service: FormBuilderService) => {
      expect(service).toBeTruthy();
    }
  ));
});
