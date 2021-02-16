$(document).ready(function() {
  
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });


  $("#department").change(function() {
    var department = $(this).val();
    
    $('#whom_to_meet').empty();
    $.post(whom_to_meet,{

        'department_id' : department,                
    },
    function(data,status) { 
         
         for(x in data){

            if(x == 'no-employee'){
              $('#whom_to_meet').append('<option value="'+ x +'">No Employee</option>');
            }else{
              $('#whom_to_meet').append('<option value="'+ x +'">'+ data[x] +'</option>');
            }
         }
         
         //this comment is for autocomplete method
         /*$( "#searchEmployee" ).autocomplete({
              source: data, 
          });*/

    });           
  });
  //end of function


$(".blacklist").each(function() {

   $(this).click(function(event){
    event.preventDefault();
    
      $(this).load( $(this).attr('href'),
      function(response,status){
        
        if(JSON.parse(response).feedback=="blacklist")
        {
          $(this).html('Blacklisted').prop('disabled','true');
          
        }else{

        }
      });
   });
});
//end of funtion

$(".unblacklist").each(function() {

   $(this).click(function(event){
    event.preventDefault();
    
      $(this).load( $(this).attr('href'),
      function(response,status){
        

        if(JSON.parse(response).feedback=="unblacklist")
        {
          $(this).html('Unblocked').prop('disabled','true');
          
        }else{
          $(this).html();
        }
      });
   });
});
//end of funtion


$('.check-out').each(function(){
    $(this).click(function(event){
        event.preventDefault();
        var tr = $(this).parents("tr");
        $(this).load($(this).attr('href'),
          function(response,status){

            if(JSON.parse(response).feedback=="checkout")
            {
              $(this).html('Checked Out').prop('disabled','true');
              
              //tr.html("<th colspan='5'>" + response + " Checked Out</th>");

            }else{
              //$(this).html('Check Out');
            }
          });
        //end of ajax get
     });
      //end of click
});
//end of check out each


$('form_sample_3').submit(function(event){
      // start different way
       event.preventDefault();

        $.ajax({
            url: ajaxuniquecheck,
            method:'POST',
            dataType:'json',
            data: $(this).serialize(),
            success:function(data){
              // $("#company_phone_error").html("");
              console.log(data.responseJSON);    
            },
            error:function(data){
               //$("#company_phone_error").html(data.responseJSON.phone).css('color','red');

                // $("#name_error").html(data.responseJSON.name);
                console.log(data.responseJSON);
            }
        });
        //different way to implement end

    });





//Search toggle btn in visitor page
$("#filter-toggle").click(function(){
  $('.search-filter').toggle('fast');
  $('.portlet.light .dataTables_wrapper .dt-buttons').toggleClass('toggle-margin');
});
//end of search toggle

$('.reset').each(function(){
  $(this).click(function(){
   $(this).parents('.search-filter').reset();
  });
});

}); 