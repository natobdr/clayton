scbQMapp.controller('appWhmcsOrder', function ($scope, $http, $modal,$interval) {




    $scope.open = function () {

        var modalInstance = $modal.open({
            templateUrl: '/wp-content/plugins/scb_whmcsOrder/ng/views/'+$scope.language+'/modal.html?ver=13',
            controller: 'whmcsOrderModal',
            size: 'sm',
            windowClass: 'scb_whmcsOrderModal'
        });
    }

    $scope.openModelsNavigation = function () {

        var modalInstance = $modal.open({
            templateUrl: '/wp-content/plugins/scb_whmcsOrder/ng/views/'+$scope.language+'/modalModelsNavigation.html?ver=13',
            controller: 'modelsNavigationModal',
            size: 'lg',
            windowClass: 'scb_modelsNavigation bs3',
            backdropClass : 'scb_modelsNavigationBackdrop',
            resolve: {
                items: function () {
                    return $scope.models;
                }
            }
        });
    }

    //popover on button
    $interval(function () {
        $scope.appWhmcsOrderOpenPopover();
    }, 5000, 1);

    var getQueryVariable = function (variable)
    {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable){return pair[1];}
        }
        return(false);
    }

    if(getQueryVariable('queroEste')==1)
    {
        $interval(function () {
            $scope.open();
        }, 1000, 1);
    }



}).directive('appWhmcsOrder', function () {

    //verificaçao de utilização de iframe
    if (window.location != window.parent.location) {
        return;
    }

    return {
        restrict: 'E',
        templateUrl: function(elem, attr){
            return '/wp-content/plugins/scb_whmcsOrder/ng/views/'+attr.language+'/app.html';
        }
    };
}).directive('appWhmcsOrderPopover', function () {
    return {
        restrict: "A",
        link: function ($scope, element, attr) {

            var options = {
                content: attr.whmcsOrderPopoverContent,
                placement: "top",
                html: true
            };

            $(element).popover(options);

            $scope.appWhmcsOrderOpenPopover = function() {
                $(element).popover('show');
            }
        }
    };
});
//.directive('appModelsNavigation', function () {
//
//    //verificaçao de utilização de iframe
//    if (window.location != window.parent.location) {
//        return;
//    }
//
//    return {
//        restrict: 'E',
//        templateUrl: function(elem, attr){
//            return '/wp-content/plugins/scb_whmcsOrder/ng/views/'+attr.language+'/appModelsNavigation.html';
//        }
//    };
//});

