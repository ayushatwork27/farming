$(document).ready(function(){


  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  if(window.location.pathname == '/visitor'){
      //ajax for visitor data fetching from db when page first load
     $.ajax({
              url: $(this).attr('action'),
              method: 'POST',
              dataType:'json',
              data: $(this).serialize(),
              success:function(response){
                //console.log(response.feedback);
                customDataTable(response);
              },
              error:function(data){
                console.log(data);
              },
          });
          ////end of ajax for visitor data fetching from db when page first load
    }

  
  

function customDataTable(response){

   myDataTable = $('#myDataTable').DataTable({
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
            var view_button = "<a href ="+ window.location.href + "/" + id + 
            " class='btn btn-outline btn-circle btn-sm blue jquery-btn-view'>View</a>";
            return view_button;
          }
        },

    ],
  });
  //end of data table

}
//end of custom table function


//Start of Search filter for visitor Report

$('.search-filter').submit(function(event){

  event.preventDefault();
  $.ajax({
        url: $(this).attr('action'),
        method: 'POST',
        dataType:'json',
        data: $(this).serialize(),
        success:function(response){
          
          myDataTable.destroy();
          //console.log(response.feedback);
          customDataTable(response);
        },
        error:function(data){
          console.log(data);
        },
    });
});

//End of Search filter for visitor Report each function


}); 
