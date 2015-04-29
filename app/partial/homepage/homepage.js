'use strict';

angular.module('zhaoXueBa').controller('HomepageCtrl', function( $scope ) {
  $scope.text = 'Hello';
  $scope.showtext = true;
  $scope.getShowtext = function() {
    return $scope.showtext;
  };
  $scope.changetext = function() {
    $scope.showtext = !$scope.showtext;
  };
});
