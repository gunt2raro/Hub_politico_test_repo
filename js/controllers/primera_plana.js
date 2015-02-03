/****
* Ready function
* Method principal
****************************/
$(document).ready(function(){

	load_header_principal();//First load the principal header
	load_content_front_page();//Load the front page
	load_footer_principal();//then the principal footer

});//End of load_header_principal Method

/***
* load_header_principal
* Method that loads the principal header
* @params none
* @return none
********************************/
function load_header_principal(){

	$.ajax({

		url : "/Hub_politico_test/Views/header.php",
		cache : true,
		success : function( response ){

			$( ".header" ).html( response );

		}

	});

}//End of load_header_principal Method

/***
* load_content_front_page
* Method that loads the principal footer
* @params none
* @return none
********************************/
function load_content_front_page(){

	$.ajax({

		url : 'http://162.243.154.28:4550/users/',
		type: 'GET',
		dataType : 'json',
		success : function( response ){


			//Logic of the header
			alert( "it works!!!" );

		},
		error : function(){

			alert( "It didn't work!!!'" );

		}

	});

}//End of load_content_front_page Method

/***
* load_footer_principal
* Method that loads the principal footer
* @params none
* @return none
********************************/
function load_footer_principal(){

	$.ajax({

		url : "/Hub_politico_test/Views/footer.php",
		cache : true,
		success : function( response ){

			$( ".footer" ).html( response );

		}

	});

}//End of load_header_principal Method
