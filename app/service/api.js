'use strict';

angular.module('zhaoXueBa').factory('Api', function($location, $http) {

  var Api = {

    server: function() {
      return 'http://yueme.us/database/';
    },

    whole: function(url) {
      return this.server() + url;
    },

    act: function(action) {
      return this.server() + 'master.php?action=' + action;
    },

    // http methods
    get: function(url) {
      return $http.get(this.whole(url));
    },

    post: function(action, data) {
      return $http.post(this.act(action),data)
    },

    delete: function(url) {
      return $http.delete(this.whole(url));
    }
  };

  return Api;
});
