(function(){
	"use strict";

	$('[ajax-form]').each(function(){
		var $this = $(this);
			
		$this.submit(function(e) {
			var data = $this.serialize();
			$.ajax({
				type: $this.attr('method'),
			  	url: $this.attr('action'),
			  	data: data,
			  	success: function(response){
			  		console.log(response);
			  	},
			  	dataType: "json"
			});
		    e.preventDefault();
		});
	});

})();