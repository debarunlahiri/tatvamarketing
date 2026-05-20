<script type="text/javascript" charset="utf-8" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>

<script src="js/tinymce/js/tinymce/tinymce.min.js"></script>

<script type="text/javascript" >

$(function()

{

  //tinymce.init({selector:'#message'});

  tinymce.init({

                 selector: "#message",

                 theme : "modern",

                 

                    relative_urls: true,

                    document_base_url : "http://mydomain.com/",

                    

                    plugins: [

                         "link image preview hr anchor pagebreak ",

                         "searchreplace wordcount visualblocks visualchars code nonbreaking",

                         "directionality textcolor jbimages"

                   ],

                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

                toolbar2: "print preview media | forecolor backcolor emoticons",

                image_advtab: true,

                templates: [

                    {title: 'Test template 1', content: 'Test 1'},

                    {title: 'Test template 2', content: 'Test 2'}

                ]

            });

  $('#loginform').submit(function(e)

  {

            var customersIds = [];

            $("input[name='id[]']:checked").each(function(){customersIds.push($(this).val());});

			var subject=$("#subject").val();

			var message=tinyMCE.activeEditor.getContent();

	        $.ajax(

			{

                       url :  'mail/process.php',

                       type : 'POST',

                       data : 'customersIds='+customersIds+'&message='+message+'&subject='+subject,

                       success : function(data)

					   { 

                           alert(data);

                       }

             }); 

            return false;

  });

  $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal"});

  $( "body" ).on( "click", ".sort_ing", function(event) 

      {

	        

	         $('#user_search_result').html('<img src="image/loader.gif">Loading....');

	         var statusIdArray=($(this).attr('id')).split(':');

			 var fieldName=statusIdArray[0];

			 var orderBy=statusIdArray[1];

			 $.ajax(

			 {

			           

			           url: "ajax/customer-sorting-ajax.php?fieldName="+fieldName+"&orderBy="+orderBy, 

				       success: function(result)

			           {

					           

					           setTimeout(function (){$('#user_search_result').html(result);}, 1000);  

                       }

			});

     });

  

   /* Start Code for Advance search */

    $("#search_cancel").click(function(){

          $("#advance_search_form").hide('slow');

      });

      $("#advance_search").click(function(){

             $( "#advance_search_form" ).toggle('slow');

      });

   $('#but_search').click(function(event) 

   {

	        $('#user_search_result').html('<img src="image/loader.gif">Loading....');

	         event.preventDefault();

			 var name=$('#name').val();

			 var city=$('#city').val();

			 var cust_code=$('#cust_code').val();

			 var state=$('#state').val();

			 //var block=parseInt($('#block').val());

			 $.ajax(

			 {

			           url: "customer_search_ajax.php?name="+name+"&city="+city+"&cust_code="+cust_code+"&state="+state, 

				       success: function(result)

			           {

					       

					       /* $('#user_search_result').html(result); */

						    setTimeout(function (){$('#user_search_result').html(result);}, 2000);  

                       }

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
		