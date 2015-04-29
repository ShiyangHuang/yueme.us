'use strict';

describe('UserlistCtrl', function() {

  var $scope, createCtrl;

  beforeEach(module('zhaoXueBa'));

  beforeEach(inject(function($rootScope, $controller) {
    $scope = $rootScope.$new();
    createCtrl = function() {
      return $controller('UserlistCtrl', {
        $scope: $scope
      });
    };
  }));

  it('should be defined', function() {
    var ctrl = createCtrl();
    expect(ctrl).toBeDefined();
  });
});
