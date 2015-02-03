//Global Variables
var toggle_search_input = false;
var toggle_search_input_2 = false;

//When document loads
$(document).ready(function(){

	$( '#search-field' ).hide();
	$( '#search-button' ).hover( search_button_hover );
	$( '#search-field' ).hover( search_field_hover );

});//End of wher document loads

//Key events
$(document).bind('keypress', function(e){
	if(e.which === 13) {

		$( '#search-field' ).trigger('click');

	}
});//End of key event

/***
* search_field_hover
* Method that performs actions when hover on the search field
* @params none
* @return none
******************************/
function search_field_hover(){

	if( !toggle_search_input_2 ){

		$( '#search-field' ).show( );
		toggle_search_input_2 = true;

	} else {

		$( '#search-field' ).hide( 1000 );
		toggle_search_input_2 = false;

	}

}//End of search_field_hover Method

/***
* search_button_hover
* Method that performs actions when hover on the search button
* @params none
* @return none
******************************/
function search_button_hover(){

	//Search button hover
	if( !toggle_search_input || !toggle_search_input_2 ){

		$( '#search-field' ).show( "slow" );
		$( '#search-field' ).focus( );

		toggle_search_input = true;

	} else {

		$( '#search-field' ).hide( 1000 );
		toggle_search_input = false;

	}

}//End of search_button_hover Method


/***
* search_field_action
* Method that performs actions when enter search field
* @params none
* @return none
******************************/
function search_field_action(){

	//Search button actions

}//End of search_button_action Method
