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
		    .state('auth', {
		      url: "/login",
		      templateUrl: "views/app/login/login.html"
		    })
		    .state('auth.register', {
		    	url: "/register",
		    	templateUrl: "views/app/register/register.html"
		    });
    
	});

})();