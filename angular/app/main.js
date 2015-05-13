(function(){
	"use strict";
	var app = angular.module('app',
		[
		'app.controllers',
		'app.filters',
		'app.services',
		'app.directives',
		'app.routes',
		'app.config',
		'app.themes'
		]);

	angular.module('app.routes', ['ui.router']);
	angular.module('app.controllers', ['ui.router']);
	angular.module('app.filters', []);
	angular.module('app.services', ['ui.router']);
	angular.module('app.directives', []);
	angular.module('app.config', []);
	angular.module('app.themes', ['ngMaterial'])
      .config(function($mdThemingProvider, $mdIconProvider){
          $mdIconProvider
                      .defaultIconSet("./assets/svg/avatars.svg", 128)
                      .icon("menu"       , "./assets/svg/menu.svg"        , 24)
                      .icon("share"      , "./assets/svg/share.svg"       , 24)
                      .icon("google_plus", "./assets/svg/google_plus.svg" , 512)
                      .icon("hangouts"   , "./assets/svg/hangouts.svg"    , 512)
                      .icon("twitter"    , "./assets/svg/twitter.svg"     , 512)
                      .icon("phone"      , "./assets/svg/phone.svg"       , 512);
          
          $mdThemingProvider.theme('default')
                          .primaryPalette('blue')
                          .accentPalette('red');
      });
})();