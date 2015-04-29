'use strict';

angular.module('zhaoXueBa').controller('LoginCtrl', function( $scope ,$http, User, Api) {

  $scope.loginInit = function() {
    User.reset();
  };

  $scope.signin = function() {
    Api.post('user_login',$scope.user).success(function(data){
      $scope.info = data[0];
      if($scope.info.status == 'success') {
        User.login($scope.info);
        window.location.href="#/searcher";
      };
    }).error(function(){
      $scope.info = 'No internet connection';
      User.login($scope.user);
      //window.location.href="#/searcher";
    });
    //console.log($scope.info);
  };
});
