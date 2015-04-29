'use strict';

describe('HomepageCtrl', function() {

  var $scope, createCtrl;

  beforeEach(module('cantFindNameFromPackagejson'));

  beforeEach(inject(function($rootScope, $controller) {
    $scope = $rootScope.$new();
    createCtrl = function() {
      return $controller('HomepageCtrl', {
        $scope: $scope
      });
    };
  }));

  it('should be defined', function() {
    var ctrl = createCtrl();
    expect(ctrl).toBeDefined();
  });
});
