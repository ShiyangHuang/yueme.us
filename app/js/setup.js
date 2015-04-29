'use strict';
/* globals _ */

angular.module('zhaoXueBa', [
  'ngAnimate',
  'ngSanitize',
  'ngRoute',
  'route-segment',
  'view-segment',
  'ui.bootstrap',
  'ui.utils',
  'http-auth-interceptor',
  'autocomplete',
  'angular-md5'
])

.config(function($routeSegmentProvider, $routeProvider) {

  $routeSegmentProvider.options.autoLoadTemplates = true;

  /* Add New Route Segments Above */

    $routeSegmentProvider
      .when('/', 'homepage')
      .when('/about', 'about')
      .when('/login', 'login')
      .when('/register', 'register')
      .when('/searcher', 'searcher')
      .when('/userlist', 'userlist')
      .when('/profile', 'profile')
    ;

    $routeSegmentProvider.segment('homepage', {
      templateUrl: 'partial/homepage/homepage.html'
    });
    $routeSegmentProvider.segment('about', {
      templateUrl: 'partial/about/about.html'
    });
    $routeSegmentProvider.segment('login', {
      templateUrl: 'partial/login/login.html'
    });
    $routeSegmentProvider.segment('register', {
      templateUrl: 'partial/register/register.html'
    });
    $routeSegmentProvider.segment('searcher', {
      templateUrl: 'partial/searcher/searcher.html'
    });
    $routeSegmentProvider.segment('userlist', {
      templateUrl: 'partial/userlist/userlist.html'
    });
    $routeSegmentProvider.segment('profile', {
      templateUrl: 'partial/profile/profile.html'
    });
    $routeProvider.otherwise({
      redirectTo: '/'
    });
})

.run(function($rootScope) {

  $rootScope.safeApply = function(fn) {
    var phase = $rootScope.$$phase;
    if (phase === '$apply' || phase === '$digest') {
      if (fn && (typeof(fn) === 'function')) {
        fn();
      }
    } else {
      this.$apply(fn);
    }
  };
})

.run(function() {
  _.mixin(_.str);
});
