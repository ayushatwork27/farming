$(document).ready(function(){

	function ajax(url,method,data_type,data){
		

	}
	if(window.location.pathname == '/dashboard'){
		
		function dashboard_snippet(selector){
			
			$.ajax({
				url: selector.attr('data-target'),
				method: 'POST',
				dataType:'json',
				data : {
					'key' : selector.attr('id')
				},
				success : function(response){
					
					dashboard_visitor(selector.attr('id'),response,'pie',selector[0]);
				},
				
			});
		}

		dashboard_snippet($('#department-container'));
		dashboard_snippet($('#location-container'));
		
	}

	function dashboard_visitor(column_data,row_data,chart_type,selector){
		google.charts.load('current', {packages: ['corechart']});

		function drawChart() {
		    // Define the chart to be drawn.
		    var data = new google.visualization.DataTable();
		    data.addColumn('string', column_data);
		    data.addColumn('number', 'Visitors');
		    data.addRows(row_data.feedback);
		       
		    // Set chart options
		    var options = {
		    	'title':'Last 30 Days Visitors According to ' + column_data.slice(0,column_data.indexOf('-'))
		    };

		    // Instantiate and draw the chart.
		    if(chart_type == 'column'){
		    	var chart = new google.visualization.ColumnChart(selector);
		    }else{
		    	var chart = new google.visualization.PieChart(selector);
		    }
		    
		    chart.draw(data, options);
		 }
		 google.charts.setOnLoadCallback(drawChart); 
	}
	//End of dashboard_visitors function



	if( window.location.pathname == '/visitors-report/department' ||
		window.location.pathname == '/visitors-report/employee'   ||
		window.location.pathname == '/visitors-report/location'){

		$.ajax({
			url: window.location.href + '/graph',
			method: 'get',
			success : function(response){
				
				
				var column_data = ['string',response.id,'number','Visitor'];
				var chart_type = 'Area';
				var selector = $('#visitor-report-department-graph')[0];
				var title = 'Visitors Report Vs ' + response.id;

				department_visitor(column_data,response,chart_type,selector,title);
			},
			
		});

	}



	function department_visitor(column_data,row_data,chart_type,selector,title){
		google.charts.load('current', {packages: ['corechart']});

		function drawChart() {
		    // Define the chart to be drawn.
		    var data = new google.visualization.DataTable();

		    data.addColumn(column_data[0], column_data[1]);
		    data.addColumn(column_data[2], column_data[3]);
		    data.addRows(row_data.feedback);
		       
		    // Set chart options
		    var options = {'title':title};

		    // Instantiate and draw the chart.
		    var chart = new google.visualization.AreaChart(selector);
		    
		    chart.draw(data, options);
		 }
		 google.charts.setOnLoadCallback(drawChart); 
		}




$('.report-select').each(function(){
	
	$.ajax({
			url: $(this).parents('form').attr('action'),
			method: 'post',
			data: {
				key: 'default',
				value: $(this).val(),
			},
			success : function(response){
				
				customDataTableforReport(response);
			}
			
	});
	$(this).change(function(){
		
		$.ajax({
			url: $(this).parents('form').attr('action'),
			method: 'post',
			data: {
				key: $(this).attr('name'),
				value: $(this).val(),
			},
			success : function(response){
				myDataTable1.destroy();
				customDataTableforReport(response);
			},
			
		});

	});
	//change function
});
//end of report-select each function


function customDataTableforReport(response){

   myDataTable1 = $('.visitor-report-data-table').DataTable({
    data: response.feedback,
    columns:[
        { 'data':'name' },
        { 'data':'email' },
        { 'data':'phone' },
        { 
          'data' : 'created_at',
          'render': function(created_at){
             var d =  new Date(created_at);
             return d.getDate() + "/" + d.getMonth() + "/" + d.getFullYear();
          },
        },
        {
          'data':'created_at',
          'render' : function(created_at){
            var d =  new Date(created_at);
            var hours = d.getHours() < 10 ? "0" + d.getHours() : d.getHours(); 
            var minutes = d.getMinutes() < 10 ? "0" + d.getMinutes() : d.getMinutes();
            var ampm = d.getHours() < 12 ? "AM"  : "PM"; 
            return hours + ":"+ minutes +" "+ ampm ;
          }
        },
        {
          'data':'id',
          'render':function(id){
            var view_button = "<a href =visitor/"+ id + 
            " class='btn btn-outline btn-circle btn-sm blue jquery-btn-view'>View</a>";
            return view_button;
          }
        },

    ],
  });
  //end of data table

}
//end of custom table function

});