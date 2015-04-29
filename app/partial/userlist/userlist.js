'use strict';

angular.module('zhaoXueBa').controller('UserlistCtrl', function( $scope , $http , User, Api) {
  $scope.user = User.getUser();
  $scope.getUserlist = function() {

    Api.post('get_userlist',$scope.user).success(function(data){
      $scope.userlist = data;
    }).error(function(){
      $scope.userlist = 'No internet connection';
    });
    //console.log($scope.userlist);
  };

  $scope.postByMyself = function(email) {
    return email == $scope.user.email;
  };
  $scope.deleteByID = function(id) {
    Api.post('post_delete',id).success(function(data){
      $scope.deleteresponse = data;
    }).error(function(){
      $scope.deleteresponse = 'No internet connection';
    });
    $scope.getUserlist();
  };
});
