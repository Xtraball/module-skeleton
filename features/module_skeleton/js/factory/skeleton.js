/**
 * Skeleton
 *
 * @version 1.0.0
 */
angular.module("starter").factory("Skeleton", function ($pwaRequest) {
    var factory = {
        value_id: null,
        extendedOptions: {}
    };

    /**
     * @param valueId
     */
    factory.setValueId = function (valueId) {
        factory.value_id = valueId;
    };

    /**
     *
     */
    factory.loadContent = function (refresh) {
        return $pwaRequest.get('moduleskeleton/mobile_list/load-content', {
            urlParams: {
                value_id: factory.value_id
            },
            cache: !refresh
        });
    };

    return factory;
});
