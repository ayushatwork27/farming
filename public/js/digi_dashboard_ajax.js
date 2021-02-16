$(document).ready(function(){

	$.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
	
	
	var ajax_for_dashboard = {
		ajax_method : function(selectorClass,dataFetch){
			
			$.ajax({
				url : selectorClass.parents('a').attr('href'),
				method: 'GET',
				success:function(response){
					selectorClass.html(response.data);
				}
			});
			//end of $.ajax
		}
		//end of ajax_method
	}
	//end of object

	ajax_for_dashboard.ajax_method($('.dashboard-departments'),'departments');
	ajax_for_dashboard.ajax_method($('.dashboard-employees'));
	//jax_for_dashboard.ajax_method($('.dashboard-licences'));

});
//end of document ready
