'use strict';

angular.module('zhaoXueBa').controller('SearcherCtrl', function( $scope, $http, User, Api) {

  $scope.setInit = function() {
    $scope.info = User.getUser();
  };

  $scope.postText = function() {
    Api.post('post_text',$scope.info).success(function(data){
      $scope.response = data;
      //console.log($scope.response);
      $scope.info = null;
      window.location.href="#/userlist";
    }).error(function(){
      $scope.response = "ERROR";
    });
  };
});
