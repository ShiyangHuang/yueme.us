'use strict';

angular.module('zhaoXueBa').controller('NavbarCtrl', function( $scope, User ) {
  $scope.login;
  $scope.ifLogin = function() {
    if(User.getUser()!=null) {
      $scope.user = User.getUser();
      return true;
    } else {
      return false;
    }
  }
});
