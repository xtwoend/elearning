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
      .config(["$mdThemingProvider", "$mdIconProvider", function($mdThemingProvider, $mdIconProvider){
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
      }]);
})();
(function(){
	"use strict";
		
    angular.module('app.routes',[]).config(["$stateProvider", "$urlRouterProvider", function($stateProvider, $urlRouterProvider) {
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
    
	}]);

})();
(function(){
	"use strict";

	angular.module('app.config').config( ["$httpProvider", function($httpProvider) {
		// $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
	}]);

})();
(function(){
	"use strict";

	angular.module('app.filters').filter( 'capitalize', function(){
		return function(input, all) {
			return (!!input) ? input.replace(/([^\W_]+[^\s-]*) */g,function(txt){
				return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
			}) : '';
		};
	});
})();
(function(){
	"use strict";

	angular.module('app.filters').filter( 't', ["$filter", function( $filter ){
		return function( text ){
			text = $filter('translate')(text);
			return $filter('ucfirst')(text);
		};
	}]);
})();
(function(){
	"use strict";

	angular.module('app.filters').filter( 'trustHtml', ["$sce", function( $sce ){
		return function( html ){
			return $sce.trustAsHtml(html);
		};
	}]);
})();
(function(){
	"use strict";

	angular.module('app.filters').filter('ucfirst', function() {
		return function( input ) {
			if ( !input ){
				return null;
			}
			return input.substring(0, 1).toUpperCase() + input.substring(1);
		};
	});

})();


(function(){
	"use strict";
		
	

})();
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC9tYWluLmpzIiwiYXBwL3JvdXRlcy5qcyIsImNvbmZpZy9odHRwLmpzIiwiZmlsdGVycy9jYXBpdGFsaXplLmpzIiwiZmlsdGVycy90cmFuc2xhdGlvbnMuanMiLCJmaWx0ZXJzL3RydXN0X2h0bWwuanMiLCJmaWx0ZXJzL3VjZmlyc3QuanMiLCJhcHAvbGFuZGluZy9sYW5kaW5nLmpzIiwiYXBwL2xvZ2luL2xvZ2luLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNsQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDcEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNQQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDVkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNUQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNSQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDYkE7QUNBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uKCl7XG5cdFwidXNlIHN0cmljdFwiO1xuXHR2YXIgYXBwID0gYW5ndWxhci5tb2R1bGUoJ2FwcCcsXG5cdFx0W1xuXHRcdCdhcHAuY29udHJvbGxlcnMnLFxuXHRcdCdhcHAuZmlsdGVycycsXG5cdFx0J2FwcC5zZXJ2aWNlcycsXG5cdFx0J2FwcC5kaXJlY3RpdmVzJyxcblx0XHQnYXBwLnJvdXRlcycsXG5cdFx0J2FwcC5jb25maWcnLFxuXHRcdCdhcHAudGhlbWVzJ1xuXHRcdF0pO1xuXG5cdGFuZ3VsYXIubW9kdWxlKCdhcHAucm91dGVzJywgWyd1aS5yb3V0ZXInXSk7XG5cdGFuZ3VsYXIubW9kdWxlKCdhcHAuY29udHJvbGxlcnMnLCBbJ3VpLnJvdXRlciddKTtcblx0YW5ndWxhci5tb2R1bGUoJ2FwcC5maWx0ZXJzJywgW10pO1xuXHRhbmd1bGFyLm1vZHVsZSgnYXBwLnNlcnZpY2VzJywgWyd1aS5yb3V0ZXInXSk7XG5cdGFuZ3VsYXIubW9kdWxlKCdhcHAuZGlyZWN0aXZlcycsIFtdKTtcblx0YW5ndWxhci5tb2R1bGUoJ2FwcC5jb25maWcnLCBbXSk7XG5cdGFuZ3VsYXIubW9kdWxlKCdhcHAudGhlbWVzJywgWyduZ01hdGVyaWFsJ10pXG4gICAgICAuY29uZmlnKGZ1bmN0aW9uKCRtZFRoZW1pbmdQcm92aWRlciwgJG1kSWNvblByb3ZpZGVyKXtcbiAgICAgICAgICAkbWRJY29uUHJvdmlkZXJcbiAgICAgICAgICAgICAgICAgICAgICAuZGVmYXVsdEljb25TZXQoXCIuL2Fzc2V0cy9zdmcvYXZhdGFycy5zdmdcIiwgMTI4KVxuICAgICAgICAgICAgICAgICAgICAgIC5pY29uKFwibWVudVwiICAgICAgICwgXCIuL2Fzc2V0cy9zdmcvbWVudS5zdmdcIiAgICAgICAgLCAyNClcbiAgICAgICAgICAgICAgICAgICAgICAuaWNvbihcInNoYXJlXCIgICAgICAsIFwiLi9hc3NldHMvc3ZnL3NoYXJlLnN2Z1wiICAgICAgICwgMjQpXG4gICAgICAgICAgICAgICAgICAgICAgLmljb24oXCJnb29nbGVfcGx1c1wiLCBcIi4vYXNzZXRzL3N2Zy9nb29nbGVfcGx1cy5zdmdcIiAsIDUxMilcbiAgICAgICAgICAgICAgICAgICAgICAuaWNvbihcImhhbmdvdXRzXCIgICAsIFwiLi9hc3NldHMvc3ZnL2hhbmdvdXRzLnN2Z1wiICAgICwgNTEyKVxuICAgICAgICAgICAgICAgICAgICAgIC5pY29uKFwidHdpdHRlclwiICAgICwgXCIuL2Fzc2V0cy9zdmcvdHdpdHRlci5zdmdcIiAgICAgLCA1MTIpXG4gICAgICAgICAgICAgICAgICAgICAgLmljb24oXCJwaG9uZVwiICAgICAgLCBcIi4vYXNzZXRzL3N2Zy9waG9uZS5zdmdcIiAgICAgICAsIDUxMik7XG4gICAgICAgICAgXG4gICAgICAgICAgJG1kVGhlbWluZ1Byb3ZpZGVyLnRoZW1lKCdkZWZhdWx0JylcbiAgICAgICAgICAgICAgICAgICAgICAgICAgLnByaW1hcnlQYWxldHRlKCdibHVlJylcbiAgICAgICAgICAgICAgICAgICAgICAgICAgLmFjY2VudFBhbGV0dGUoJ3JlZCcpO1xuICAgICAgfSk7XG59KSgpOyIsIihmdW5jdGlvbigpe1xuXHRcInVzZSBzdHJpY3RcIjtcblx0XHRcbiAgICBhbmd1bGFyLm1vZHVsZSgnYXBwLnJvdXRlcycsW10pLmNvbmZpZyhmdW5jdGlvbigkc3RhdGVQcm92aWRlciwgJHVybFJvdXRlclByb3ZpZGVyKSB7XG5cdCAgXHQvLyBGb3IgYW55IHVubWF0Y2hlZCB1cmwsIHJlZGlyZWN0IHRvIC9zdGF0ZTFcblx0XHQkdXJsUm91dGVyUHJvdmlkZXIub3RoZXJ3aXNlKFwiL1wiKTtcblx0XHRcblx0XHQvLyBOb3cgc2V0IHVwIHRoZSBzdGF0ZXNcblx0XHQkc3RhdGVQcm92aWRlclxuXHRcdCAgICAuc3RhdGUoJ2hvbWUnLCB7XG5cdFx0ICAgICAgdXJsOiBcIi9cIixcblx0XHQgICAgICB0ZW1wbGF0ZVVybDogXCJ2aWV3cy9hcHAvbGFuZGluZy9sYW5kaW5nLmh0bWxcIlxuXHRcdCAgICB9KVxuXHRcdCAgICAuc3RhdGUoJ2xvZ2luJywge1xuXHRcdCAgICAgIHVybDogXCIvbG9naW5cIixcblx0XHQgICAgICB0ZW1wbGF0ZVVybDogXCJ2aWV3cy9hcHAvbG9naW4vbG9naW4uaHRtbFwiXG5cdFx0ICAgIH0pO1xuICAgIFxuXHR9KTtcblxufSkoKTsiLCIoZnVuY3Rpb24oKXtcblx0XCJ1c2Ugc3RyaWN0XCI7XG5cblx0YW5ndWxhci5tb2R1bGUoJ2FwcC5jb25maWcnKS5jb25maWcoIGZ1bmN0aW9uKCRodHRwUHJvdmlkZXIpIHtcblx0XHQvLyAkaHR0cFByb3ZpZGVyLmRlZmF1bHRzLmhlYWRlcnMucG9zdFsnQ29udGVudC1UeXBlJ10gPSAnYXBwbGljYXRpb24veC13d3ctZm9ybS11cmxlbmNvZGVkO2NoYXJzZXQ9dXRmLTgnO1xuXHR9KTtcblxufSkoKTsiLCIoZnVuY3Rpb24oKXtcblx0XCJ1c2Ugc3RyaWN0XCI7XG5cblx0YW5ndWxhci5tb2R1bGUoJ2FwcC5maWx0ZXJzJykuZmlsdGVyKCAnY2FwaXRhbGl6ZScsIGZ1bmN0aW9uKCl7XG5cdFx0cmV0dXJuIGZ1bmN0aW9uKGlucHV0LCBhbGwpIHtcblx0XHRcdHJldHVybiAoISFpbnB1dCkgPyBpbnB1dC5yZXBsYWNlKC8oW15cXFdfXStbXlxccy1dKikgKi9nLGZ1bmN0aW9uKHR4dCl7XG5cdFx0XHRcdHJldHVybiB0eHQuY2hhckF0KDApLnRvVXBwZXJDYXNlKCkgKyB0eHQuc3Vic3RyKDEpLnRvTG93ZXJDYXNlKCk7XG5cdFx0XHR9KSA6ICcnO1xuXHRcdH07XG5cdH0pO1xufSkoKTsiLCIoZnVuY3Rpb24oKXtcblx0XCJ1c2Ugc3RyaWN0XCI7XG5cblx0YW5ndWxhci5tb2R1bGUoJ2FwcC5maWx0ZXJzJykuZmlsdGVyKCAndCcsIGZ1bmN0aW9uKCAkZmlsdGVyICl7XG5cdFx0cmV0dXJuIGZ1bmN0aW9uKCB0ZXh0ICl7XG5cdFx0XHR0ZXh0ID0gJGZpbHRlcigndHJhbnNsYXRlJykodGV4dCk7XG5cdFx0XHRyZXR1cm4gJGZpbHRlcigndWNmaXJzdCcpKHRleHQpO1xuXHRcdH07XG5cdH0pO1xufSkoKTsiLCIoZnVuY3Rpb24oKXtcblx0XCJ1c2Ugc3RyaWN0XCI7XG5cblx0YW5ndWxhci5tb2R1bGUoJ2FwcC5maWx0ZXJzJykuZmlsdGVyKCAndHJ1c3RIdG1sJywgZnVuY3Rpb24oICRzY2UgKXtcblx0XHRyZXR1cm4gZnVuY3Rpb24oIGh0bWwgKXtcblx0XHRcdHJldHVybiAkc2NlLnRydXN0QXNIdG1sKGh0bWwpO1xuXHRcdH07XG5cdH0pO1xufSkoKTsiLCIoZnVuY3Rpb24oKXtcblx0XCJ1c2Ugc3RyaWN0XCI7XG5cblx0YW5ndWxhci5tb2R1bGUoJ2FwcC5maWx0ZXJzJykuZmlsdGVyKCd1Y2ZpcnN0JywgZnVuY3Rpb24oKSB7XG5cdFx0cmV0dXJuIGZ1bmN0aW9uKCBpbnB1dCApIHtcblx0XHRcdGlmICggIWlucHV0ICl7XG5cdFx0XHRcdHJldHVybiBudWxsO1xuXHRcdFx0fVxuXHRcdFx0cmV0dXJuIGlucHV0LnN1YnN0cmluZygwLCAxKS50b1VwcGVyQ2FzZSgpICsgaW5wdXQuc3Vic3RyaW5nKDEpO1xuXHRcdH07XG5cdH0pO1xuXG59KSgpO1xuIiwiIiwiKGZ1bmN0aW9uKCl7XG5cdFwidXNlIHN0cmljdFwiO1xuXHRcdFxuXHRcblxufSkoKTsiXSwic291cmNlUm9vdCI6Ii9zb3VyY2UvIn0=