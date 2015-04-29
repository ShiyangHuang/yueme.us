'use strict';

describe('User', function() {

  var User;

  beforeEach(module('zhaoXueBa'));

  beforeEach(inject(function(_User_) {
    User = _User_;
  }));

  it('should be defined', function() {
    expect(User).toBeDefined();
  });
});
