'use strict';

angular.module('zhaoXueBa').factory('User', function($rootScope, $location, $window, Api) {

  var userinfo;

  var User = {
    login: function(uinfo) {
      userinfo = uinfo;
    },
    getUser: function() {
      return userinfo;
    },
    reset: function() {
      userinfo = null;
    }
  };

  return User;
});
