$(document).ready(function(){
    $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
    });
    //end of ajax setup
    $("#reseller_form1").submit(function(event){
    event.preventDefault();
    var object = {"name":"","email":"","phone":""};
        $.ajax({
                url: $("#reseller_form").attr("action"),
                method:'POST',
                dataType:'json',
                data:$(this).serialize(),
                success:function(response){
                    var string = '<div class="alert alert-success"><strong>Success:</strong> '+response.feedback+'</div>'
                    $('.portlet-fit').prepend(string);
                    $("#reseller_form")[0].reset();
                    
                },
                error:function(data){
                   
                   var error_data = data.responseJSON;
                    
                    
                    for (x in error_data) {
                       $('#reseller_'+ x +'_error').html(error_data[x]).css('color','red');
                        delete object[x];
                    }
                    error_empty(object);

                },
            });
        //end of ajax
    });
    //end of reseller form submit
    function error_empty(object){
        var x;
        for(x in object)
        {
            $('#reseller_'+ x +'_error').html('');
        }
    }

    
});