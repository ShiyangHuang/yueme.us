'use strict';

describe('Api', function() {

  var Api;

  beforeEach(module('zhaoXueBa'));

  beforeEach(inject(function(_Api_) {
    Api = _Api_;
  }));

  it('should be defined', function() {
    expect(Api).toBeDefined();
  });
});
