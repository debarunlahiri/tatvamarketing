
<script type="text/javascript" charset="utf-8" src="js/jquery-1.9.0.min.js"></script>

<script type="text/javascript" >

$(function()

{

   $( "body" ).on( "click", ".sort_ing", function(event) 

      {

	        

	         $('#user_search_result').html('<img src="image/loader.gif">Loading....');

	         var statusIdArray=($(this).attr('id')).split(':');

			 var fieldName=statusIdArray[0];

			 var orderBy=statusIdArray[1];

			 $.ajax(

			 {

			           

			           url: "ajax/state-sorting-ajax.php?fieldName="+fieldName+"&orderBy="+orderBy, 

				       success: function(result)

			           {

					           

					           setTimeout(function (){$('#user_search_result').html(result);}, 2000);  

                       }

			});

     });

 });

</script>

			<script>
                 window.location='index.php';
           </script>
		