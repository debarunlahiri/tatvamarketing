<script type="text/javascript" charset="utf-8" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
<script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" >
$(function()
{
    $( "body" ).on( "click", ".sort_ing", function(event) 
    {
         $('#user_search_result').html('<img src="image/loader.gif">Loading....');
         var statusIdArray=($(this).attr('id')).split(':');
         var fieldName=statusIdArray[0];
         var orderBy=statusIdArray[1];
         $.ajax({url: "ajax/order-sorting-ajax.php?fieldName="+fieldName+"&orderBy="+orderBy, success: function(result)
                                      {setTimeout(function (){$('#user_search_result').html(result);}, 1000);}

			});

     });
    /* Start Code for Advance search */
     $("#search_cancel").click(function()
	 {
        $("#advance_search_form").hide('slow');
     });
     $("#advance_search").click(function(){

             $( "#advance_search_form" ).toggle('slow');
     });
     $('#but_search').click(function(event) 
     {
            $('#user_search_result').html('<img src="image/loader.gif">Loading....');
            event.preventDefault();
            var customerName=$('#name').val();
            var contactPerson=$('#contactPerson').val();
            var item_codeOrder=$('#item_codeOrder').val();
            var item_codeQuot=$('#item_codeQuot').val();
			 var cityName=$('#cityName').val();
            $.ajax(
            {
                    url: "order_search_ajax.php?item_codeOrder="+item_codeOrder+"&customerName="+customerName+"&contactPerson="+contactPerson+"&item_codeQuot="+item_codeQuot+"&cityName="+cityName, 
                    success: function(result){setTimeout(function (){$('#user_search_result').html(result);}, 2000);}

			});
         });
/* End Code for Advance search */
});
</script>
<script type="text/javascript">
function checkall(objForm)
{
    len = objForm.elements.length;
    var i=0;
    for( i=0 ; i<len ; i++) 
	{
        if (objForm.elements[i].type=='checkbox')
        {
            objForm.elements[i].checked=objForm.check_all.checked;
        }
    }
}
//  End -->
</script>
			<script>
                 window.location='index.php';
           </script>
		