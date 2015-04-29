'use strict';

angular.module('zhaoXueBa').controller('RegisterCtrl', function( $scope, $http, User, Api ) {
  $scope.regist = function() {
    Api.post('user_register',$scope.user).success(function(data){
      $scope.info = data;
      if($scope.info == 'success') {
        User.login($scope.user);
        window.location.href="#/searcher";
      }
    }).error(function(){
      $scope.info = 'ERROR';
      User.login($scope.user);
      window.location.href="#/searcher";
    });
  };
  $scope.getUniversity = function() {
    Api.get('http://cn.yueme.us/database/daxue.json').success(function(data){
      $scope.university = data;
    }).error(function(){
      $scope.university = 'ERROR';
    });
    $http.get('http://cn.yueme.us/database/zhuanye.json').success(function(data){
      $scope.majors = data;
    }).error(function(){
      $scope.majors = 'ERROR';
    });
  }
});
