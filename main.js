jQuery(document).ready(function(){


    $.each($(".product_id"), function(){

        $(this).bind('click', function(){
        
            let current_id = $(this).attr('data-id');

            jQuery.ajax({
                    url: "index.php",
                    type: "POST",
                    data: {current_id:current_id},
                    dataType: "json",
                    success: function(result){
                        
                            alert(result);
                        

                    }
                    



            });
        
                 });
        



     });



});


