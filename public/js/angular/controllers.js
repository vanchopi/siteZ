'use strict';

/* Controllers */
//var phonecatApp = angular.module('phonecatApp', ['ngRoute']);

//var photoApp = angular.module('PhotoApp', ['ngRoute']);
var checkApp = angular.module('CheckApp', ['ngRoute']);
var recallApp = angular.module('RecallApp', ['ngRoute']);
//var modaleditApp = angular.module('ModalEditApp', ['ngRoute']);
//var usersApp = angular.module('usersApp', ['ngRoute']);

var welcomeApp = angular.module('WelcomeApp', ['ngRoute']);

// welcomeApp.controller('WelcomeCtrl',['$scope','$http', function($scope, $http) {
//     $scope.currencyVal;
// });

welcomeApp.directive('useFormData', function ($parse) {
    return {
      link: function (scope, element, attrs) {
        if (attrs.ngModel && attrs.value) {
          $parse(attrs.ngModel).assign(scope, attrs.value);
        }
      }
    };
});


/*
usersApp.controller('userCtrl',['$scope','$http', function($scope, $http) {
    // var pusher = new Pusher('4ee41510e7e01ef7a664', {
    //     encrypted: true
    // });
    // $scope.users = {};
    // $scope.users = {id: 1,name: "Tricia"};
    // var channel = pusher.subscribe('test');
    //     channel.bind('App\\Events\\UserHasRegistered', function(data) {
    //         console.log(data);
    //         $scope.users = data;
    //         alert($scope.users);
    //         //alert(data['name']);
    //     });

}]);

photoApp.controller('LoadItem',['$scope','$http', function($scope, $http) {
    $scope.$on('LOAD',function($scope) { $scope.loading=true});
    $scope.$on('UNLOAD',function($scope) { $scope.loading=false});
}]);


var formApp = angular.module('FormApp', ['ngRoute']);

photoApp.controller('ValidationCtrl',['$scope','$http', function($scope, $http) {
      $scope.master = {};

      $scope.update = function(comment) {
        $scope.master = angular.copy(comment);
      };
      $scope.reset = function() {
        $scope.comment = angular.copy($scope.master);
      };
      $scope.reset();
}]);

*/

checkApp.controller('ValidationCtrl', function($scope) {
  $scope.currencyVal;
});
recallApp.controller('PhoneCtrl', function($scope) {
  $scope.currencyVal;
});
recallApp.directive('phoneInput', function($filter, $browser) {
    return {
        require: 'ngModel',
        link: function($scope, $element, $attrs, ngModelCtrl) {
            var listener = function() {
                var value = $element.val().replace(/[^0-9]/g, '');
                $element.val($filter('tel')(value, false));
            };

            // This runs when we update the text field
            ngModelCtrl.$parsers.push(function(viewValue) {
                return viewValue.replace(/[^0-9]/g, '').slice(0,10);
            });

            // This runs when the model gets updated on the scope directly and keeps our view in sync
            ngModelCtrl.$render = function() {
                $element.val($filter('tel')(ngModelCtrl.$viewValue, false));
            };

            $element.bind('change', listener);
            $element.bind('keydown', function(event) {
                var key = event.keyCode;
                // If the keys include the CTRL, SHIFT, ALT, or META keys, or the arrow keys, do nothing.
                // This lets us support copy and paste too
                if (key == 91 || (15 < key && key < 19) || (37 <= key && key <= 40)){
                    return;
                }
                $browser.defer(listener); // Have to do this or changes don't get picked up properly
            });

            $element.bind('paste cut', function() {
                $browser.defer(listener);
            });
        }
    };
});
checkApp.directive('phoneInput', function($filter, $browser) {
    return {
        require: 'ngModel',
        link: function($scope, $element, $attrs, ngModelCtrl) {
            var listener = function() {
                var value = $element.val().replace(/[^0-9]/g, '');
                $element.val($filter('tel')(value, false));
            };

            // This runs when we update the text field
            ngModelCtrl.$parsers.push(function(viewValue) {
                return viewValue.replace(/[^0-9]/g, '').slice(0,10);
            });

            // This runs when the model gets updated on the scope directly and keeps our view in sync
            ngModelCtrl.$render = function() {
                $element.val($filter('tel')(ngModelCtrl.$viewValue, false));
            };

            $element.bind('change', listener);
            $element.bind('keydown', function(event) {
                var key = event.keyCode;
                // If the keys include the CTRL, SHIFT, ALT, or META keys, or the arrow keys, do nothing.
                // This lets us support copy and paste too
                if (key == 91 || (15 < key && key < 19) || (37 <= key && key <= 40)){
                    return;
                }
                $browser.defer(listener); // Have to do this or changes don't get picked up properly
            });

            $element.bind('paste cut', function() {
                $browser.defer(listener);
            });
        }

    };
});
checkApp.directive('indexInput', function($filter, $browser) {
    return {
        require: 'ngModel',
        link: function($scope, $element, $attrs, ngModelCtrl) {
            var listener = function() {
                var value = $element.val().replace(/[^0-9]/g, '');
                $element.val($filter('index')(value, false));
            };

            // This runs when we update the text field
            ngModelCtrl.$parsers.push(function(viewValue) {
                return viewValue.replace(/[^0-9]/g, '').slice(0,10);
            });

            // This runs when the model gets updated on the scope directly and keeps our view in sync
            ngModelCtrl.$render = function() {
                $element.val($filter('index')(ngModelCtrl.$viewValue, false));
            };

            $element.bind('change', listener);
            $element.bind('keydown', function(event) {
                var key = event.keyCode;
                // If the keys include the CTRL, SHIFT, ALT, or META keys, or the arrow keys, do nothing.
                // This lets us support copy and paste too
                if (key == 91 || (15 < key && key < 19) || (37 <= key && key <= 40)){
                    return;
                }
                $browser.defer(listener); // Have to do this or changes don't get picked up properly
            });

            $element.bind('paste cut', function() {
                $browser.defer(listener);
            });
        }

    };
});

checkApp.directive('valueInput', function ($parse) {
    return {
      link: function (scope, element, attrs) {
        if (attrs.ngModel && attrs.value) {
          $parse(attrs.ngModel).assign(scope, attrs.value);
        }
      }
    };
});
checkApp.directive('valueSelect', function ($parse) {
    return {
      link: function (scope, element, attrs) {
        if (attrs.ngModel) {
          $parse(attrs.ngModel).assign(scope);
        }
      }
    };
});
// ------------- Фильтр для телефона ------------- //
recallApp.filter('tel', function () {
    return function (tel) {
        //console.log(tel);
        if (!tel) { return ''; }

        var value = tel.toString().trim().replace(/^\+/, '');

        if (value.match(/[^0-9]/)) {
            return tel;
        }

        var country, city, number;

        switch (value.length) {
            case 1:
            case 2:
            case 3:
                city = value;
                break;

            default:
                city = value.slice(0, 3);
                number = value.slice(3);
        }

        if(number){
            if(number.length>3){
                number = number.slice(0, 3) + '-' + number.slice(3,7);
            }
            else{
                number = number;
            }

            return ("(" + city + ") " + number).trim();
        }
        else{
            return "(" + city;
        }

    };
});
// ------------- Фильтр для телефона ------------- //
checkApp.filter('tel', function () {
    return function (tel) {
        //console.log(tel);
        if (!tel) { return ''; }

        var value = tel.toString().trim().replace(/^\+/, '');

        if (value.match(/[^0-9]/)) {
            return tel;
        }

        var country, city, number;

        switch (value.length) {
            case 1:
            case 2:
            case 3:
                city = value;
                break;

            default:
                city = value.slice(0, 3);
                number = value.slice(3);
        }

        if(number){
            if(number.length>3){
                number = number.slice(0, 3) + '-' + number.slice(3,7);
            }
            else{
                number = number;
            }

            return ("(" + city + ") " + number).trim();
        }
        else{
            return "(" + city;
        }

    };
});

// ------------- Фильтр для индекса ------------- //
checkApp.filter('index', function () {
    return function (index) {

        if (!index) { return ''; }

        var value = index.toString().trim().replace(/^\+/, '');

        if (value.match(/[^0-9]/)) {
            return index;
        }
        var city;

        if (value.length < 7) {
            city = value;
        }
        else {
            city = value.slice(0, 6);
        }
        //console.log(city);
        return city;

    };
});

/*
checkApp.controller('ValidationCtrl',['$scope','$http', function($scope, $http) {

}]);
recallApp.controller('ValidationCtrl',['$scope','$http', function($scope, $http) {

}]);
modaleditApp.controller('ValidationCtrl',['$scope','$http', function($scope, $http) {
  
}]);
*/