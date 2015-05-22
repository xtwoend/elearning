(function(){
	"use strict";

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$('[ajax-form]').each(function(){
		var $this = $(this);
			
		$this.submit(function(e) {
			var data = $this.serialize();
			$.ajax({
				type: $this.attr('method'),
			  	url: $this.attr('action'),
			  	data: data,
			  	success: function(response){
			  		if(response.status == true)
			  		{
			  			
			  		}
			  	},
			  	dataType: "json"
			});
		    e.preventDefault();
		});
	});

})();