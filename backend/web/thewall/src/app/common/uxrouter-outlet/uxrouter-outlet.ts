import { RouterOutlet, ActivatedRoute } from '@angular/router';
import { ComponentRef, Directive } from '@angular/core';

@Directive({
  selector: 'uxrouter-outlet'
})
export class UxrouterOutlet extends RouterOutlet {
  attach(ref: ComponentRef<any>, activatedRoute: ActivatedRoute) {
    super.attach(ref, activatedRoute);

    if (
      ref.instance.nguxAttached &&
      typeof ref.instance.nguxAttached === 'function'
    ) {
      ref.instance.nguxAttached();
    }
  }

  detach(): ComponentRef<any> {
    const ref = super.detach();

    if (
      ref.instance.nguxDetached &&
      typeof ref.instance.nguxDetached === 'function'
    ) {
      ref.instance.nguxDetached();
    }

    return ref;
  }
}
