(function(){
	"use strict";
		
    angular.module('app.routes',[]).config(function($stateProvider, $urlRouterProvider) {
	  	// For any unmatched url, redirect to /state1
		$urlRouterProvider.otherwise("/");
		
		// Now set up the states
		$stateProvider
		    .state('home', {
		      url: "/",
		      templateUrl: "views/app/landing/landing.html"
		    })
		    .state('login', {
		      url: "/login",
		      templateUrl: "views/app/login/login.html"
		    });
    
	});

})();