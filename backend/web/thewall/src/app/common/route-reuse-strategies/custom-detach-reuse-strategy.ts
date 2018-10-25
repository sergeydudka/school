import { RouteReuseStrategy, ActivatedRouteSnapshot, DetachedRouteHandle } from '@angular/router';

/**
 * This reuse
 */
export class CustomDetachReuseRouterStrategy implements RouteReuseStrategy {
  private handlers: { [key: string]: DetachedRouteHandle } = {};

  /**
   * Determines if this route (and its subtree) should be detached to be reused later
   * @param route
   */
  shouldDetach(route: ActivatedRouteSnapshot): boolean {
    if (!route.routeConfig || route.routeConfig.loadChildren) return false;

    return route.routeConfig.data ? route.routeConfig.data.detach : false;
  }

  /**
   * Stores the detached route.
   */
  store(route: ActivatedRouteSnapshot, handler: DetachedRouteHandle): void {
    if (!handler) return;

    this.handlers[this.getUniqueKey(route)] = handler;
  }

  /**
   * Determines if this route (and its subtree) should be reattached
   * @param route Stores the detached route.
   */
  shouldAttach(route: ActivatedRouteSnapshot): boolean {
    return !!this.handlers[this.getUniqueKey(route)];
  }

  /**
   * Retrieves the previously stored route
   */
  retrieve(route: ActivatedRouteSnapshot): DetachedRouteHandle {
    if (!route.routeConfig || route.routeConfig.loadChildren) return null;

    return this.handlers[this.getUniqueKey(route)];
  }

  /**
   * Determines if a route should be reused
   * @param future
   * @param current
   */
  shouldReuseRoute(future: ActivatedRouteSnapshot, current: ActivatedRouteSnapshot): boolean {
    let reuse;

    if (future && future.data && future.data.uniqueId && current && current.data && current.data.uniqueId) {
      // reuse = future.data.reuse;
      reuse = future.data.uniqueId === current.data.uniqueId;
    }

    /**
     * Custom logic allows us to override default Angular behavior
     * by passing ruese in data object of any route
     *
     * Else is ternary refers to Angular default logic
     * @see https://github.com/angular/angular/blob/6.0.0/packages/router/src/route_reuse_strategy.ts#L71
     *
     */
    return reuse !== undefined ? reuse : future.routeConfig === current.routeConfig;
  }

  /**
   * Returns a unique key for the current route
   * @param route
   */
  getUniqueKey(route: ActivatedRouteSnapshot): string {
    if (!route.routeConfig) return;

    let index = 0,
      key = '';

    for (var i in route.params) {
      key += `${index > 0 ? '-' : ''}${i}_${route.params[i]}`;
      index++;
    }

    if (route.data) {
      key += JSON.stringify(route.data);
    }

    return key;
  }
}
