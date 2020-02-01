scbQMapp.controller('whmcsOrderModal', function ($scope, $http, $interval, $modalInstance) {

    $scope.tab = 'checkLogin';
    $scope.loader = false;
    $scope.endtab = 1;
    $scope.progresBarCount = 1;
    $scope.plan = 'free';
    $scope.domain = '.site.com.br';

    //function for transform json in POST
    var transform = function (obj) {
        var str = [];
        for (var p in obj)
            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        return str.join("&");
    };

    //check login
    //if logged, show the screen of choose domain
    $http.post('?scb_whmcsOrder_action=checkLogin', {}, {
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'},
        transformRequest: transform
    }).success(function (responseData) {
        if (responseData.status == 'success') {
            $scope.tab = 'chooseDomain';
            $scope.urlAutologinWHMCS = responseData.urlAutologinWHMCS;
        }
        else
            $scope.tab = 'login';
    });

    $scope.makeLogin = function () {

        $scope.formLoginRetorno = false;
        $scope.loader = 'formLogin';

        if ($scope.formLogin.$invalid)
            return;

        $http.post('?scb_whmcsOrder_action=doLogin', {
            'loginEmail': $scope.formLogin.loginEmail.$viewValue,
            'loginPass': $scope.formLogin.loginPass.$viewValue
        }, {
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'},
            transformRequest: transform
        }).success(function (responseData) {
            $scope.loader = false;

            if (responseData.status == 'success') {
                $scope.tab = 'chooseDomain';
                $scope.urlAutologinWHMCS = responseData.urlAutologinWHMCS;
            }
            else
                $scope.formLoginRetorno = responseData.message;
        });


    }

    $scope.signUp = function () {

        $scope.formSignUpRetorno = false;
        $scope.loader = 'formSignUp';

        if ($scope.formSignUp.$invalid)
            return;

        $http.post('?scb_whmcsOrder_action=signUp', {
            'signupName': $scope.formSignUp.signupName.$viewValue,
            'signupEmail': $scope.formSignUp.signupEmail.$viewValue,
            'signupPass': $scope.formSignUp.signupPass.$viewValue
        }, {
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'},
            transformRequest: transform
        }).success(function (responseData) {
            //console.log(responseData);
            $scope.loader = false;

            if (responseData.status == 'success') {
                $scope.tab = 'chooseDomain';
                $scope.urlAutologinWHMCS = responseData.urlAutologinWHMCS;
            }
            else
                $scope.formSignUpRetorno = responseData.message;


        });
    }

    $scope.createSite = function () {

        $scope.formChooseDomainRetorno = false;
        $scope.loader = 'formChooseDomain';



        if ($scope.formChooseDomain.$invalid)
            return;

        $http.post('?scb_whmcsOrder_action=createSite', {
            'subdomain': $scope.formChooseDomain.subdomain.$viewValue,
            'domain': $scope.formChooseDomain.domain.$viewValue,
            'plan': $scope.formChooseDomain.plan.$viewValue
        }, {
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'},
            transformRequest: transform
        }).success(function (responseData) {

                //console.log(responseData);

                $scope.loader = false;

                $scope.autoLoginEp = responseData.autoLoginEp;

                if(responseData.redir != undefined)
                {
                    window.location.href = responseData.redir;
                    return;
                }

                if (responseData.status == 'success') {
                    $scope.tab = 'end';
                    $scope.serviceId = responseData.serviceId;


                    //progress bar with timer
                    $interval(function () {

                        if ($scope.progresBarCount == 15) {
                            $scope.endtab = 2;
                            return;
                        }

                        $scope.progresBarCount++;

                    }, 1000, 15);

                }
                else {
                    //check login problems and send back to login modal
                    var patt = /faça o login/i;
                    if (patt.test(responseData.message)) {
                        $scope.formLoginRetorno = responseData.message;
                        $scope.tab = 'login';
                    }
                    else {
                        $scope.formChooseDomainRetorno = responseData.message;
                    }


                }
            }
        )

    }


    $scope.toggleDropdown = function ($event) {
        $event.preventDefault();
        $event.stopPropagation();
        $scope.status.isopen = !$scope.status.isopen;
    };

    $scope.ok = function () {
        $modalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $scope.tab = 'login';
        $modalInstance.dismiss('cancel');
    };
});


scbQMapp.controller('modelsNavigationModal', function ($scope, $http, $modalInstance, items) {

    $scope.currentPage = 0;
    $scope.data = items;

    var pageQuantity = function () {
        var width = window.innerWidth;

        if (width >= 1200)
            return 12;
        else if (width >= 735 && width < 1200)
            return 4;
        else if (width < 735)
            return 1;
    }

    function resizeWindow()
    {
        $scope.currentPage = 0;
        $scope.pageSize = pageQuantity();
    }

    window.addEventListener("resize", resizeWindow);

    $scope.pageSize = pageQuantity();

    $scope.numberOfPages = function () {
        return Math.ceil($scope.data.length / pageQuantity());
    }


    $scope.cancel = function () {
        $scope.tab = 'login';
        $modalInstance.dismiss('cancel');
    };


}).filter('startFrom', function () {
    return function (input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});