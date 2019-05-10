/**
 * Skeleton
 *
 * @version 1.0.0
 */
angular.module("starter").controller("SkeletonIndexController", function ($scope, $stateParams, $state, $translate,
                                                                          $timeout, Dialog, Skeleton) {
    angular.extend($scope, {
        isLoading: true,
        value_id: $stateParams.value_id,
        pageTitle: $translate.instant("Skeleton", "skeleton"),
        skeleton: {
            title: "",
            subtitle: "",
        },
        collection: []
    });

    Skeleton.setValueId($stateParams.value_id);

    /**
     * Load page payload
     */
    $scope.loadContent = function (refresh) {
        Skeleton
        .loadContent(refresh)
        .then(function (payload) {
            $timeout(function () {
                $scope.collection = payload.collection;
                $scope.pageTitle = payload.pageTitle;
                $scope.skeleton.title = payload.title;
                $scope.skeleton.subtitle = payload.subtitle;
            });
        }, function (error) {
            Dialog.alert("Error", error.message, "OK", 3500, "skeleton");
        });
    };

    $scope.refresh = function () {
        $scope.loadContent(true);
    };

    $scope.loadContent(false);
});
