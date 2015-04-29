'use strict';

angular.module('zhaoXueBa').controller('ProfileCtrl', function( $scope, $http, User, Api ) {

  $scope.getUniversity = function() {
      $http.get('http://cn.yueme.us/database/daxue.json').success(function(data){
        $scope.university = data;
      }).error(function(){
        $scope.university = "ERROR";
      });
      Api.get('zhuanye.json').success(function(data){
        $scope.majors = data;
      }).error(function(){
        $scope.majors = "ERROR";
      });
    $scope.user = User.getUser();
    $scope.newuser = $scope.user;
    $scope.newuser.password = null;
  };

  $scope.updateProfile = function() {
    Api.post('user_update',$scope.newuser).success(function(data){
      $scope.info = data;
      $scope.response = "Success";
    }).error(function(){
      $scope.info = "ERROR";
    });
  };
});
