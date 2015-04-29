'use strict';

describe('LoginCtrl', function() {

  var $scope, createCtrl;

  beforeEach(module('zhaoXueBa'));

  beforeEach(inject(function($rootScope, $controller) {
    $scope = $rootScope.$new();
    createCtrl = function() {
      return $controller('LoginCtrl', {
        $scope: $scope
      });
    };
  }));

  it('should be defined', function() {
    var ctrl = createCtrl();
    expect(ctrl).toBeDefined();
  });
});
