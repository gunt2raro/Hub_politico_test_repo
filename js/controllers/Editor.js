
var array_of_pos_elements = new Array();
var cont = 0;
var writer_helper;

$(document).ready(function(){

	//global objects
	writer_helper = new writer_helper();
	array_of_pos_elements.push( 1 );
	array_of_pos_elements.push( 2 );
	//Hide all options when added
	hide_all_options();
	//Action for the titles to convert when clicked to edit
	$('.title_post').hover( input_title_action );
	//Make all the text areas autogrow
	$('.paragraph_app').keyup( resize_action );
	//Adding action to the adding button
	$( '.fa.fa-plus.tool_element' ).click( add_button_action );
	//Show options when hover
	$( '.row.element_box' ).hover( show_options_when_hover, hide_all_options );
	//Button for saving all
	$( '#save_post' ).click( save_post_action );

});//End

/*
* input_title_action
* Function that performs all the actions for the input_title
*/
function input_title_action( ){



}//End of input_title_action function


/*
* autoresize
* Method that resizes a text area
*/
function autoresize(textarea) {
    textarea.style.height = '50px';     //Reset height, so that it not only grows but also shrinks
    textarea.style.height = (textarea.scrollHeight+10) + 'px';    //Set new height
}//End of aturoresize function

function resize_action( e ){

	var key = e.which;

	if(key == 13){
		cont = 0;
	   	autoresize(this);
	   	return false;

	}else if( key == 17 ){

		cont = 0;
	   	autoresize(this);
	   	return false;

	}else if( cont == 40 ){

		cont = 0;
		autoresize( this );
		return false;

	}else {

		cont++
		return false;

	}

}//End of resize_action function

function add_button_action (){
	//Local variables
	var ban = 0;
	var name_num_ant = $(this.parentNode).attr( 'id' );
	var num_ant = name_num_ant.substr( 19, name_num_ant.length - 1 );
	//Orginize the elements so the elements are in order when comparing
	array_of_pos_elements.sort();
	//This adds on any position the element on the editor
	for( var i = 0; i < array_of_pos_elements.length; i++ ){

		if( parseFloat( num_ant ) < array_of_pos_elements[i] && ban == 0 ){

			var real_num = parseFloat( array_of_pos_elements[i] ) - 0.1 ;

			array_of_pos_elements.push( parseFloat( array_of_pos_elements[i] ) - 0.1 );

			ban = 1;

			$( writer_helper.paragraph( real_num ) ).insertBefore( $( "#element_post_" + array_of_pos_elements[i] ) );

			$( '.fa.fa-plus.tool_element' ).off( "click" );
			$( '.fa.fa-plus.tool_element' ).click( add_button_action );
			$('.paragraph_app').keyup( resize_action );

			//Show options when hover
			$( '.row.element_box' ).hover( show_options_when_hover, hide_all_options );

		}

	}
	//This adds on the bottom of the editor an element
	if( ban == 0 ){

		var real_num = parseFloat(num_ant) + 1;

		array_of_pos_elements.push( real_num );

		$( '#elements_box' ).append( writer_helper.paragraph( real_num ) );
		$( '.fa.fa-plus.tool_element' ).off( "click" );
		$( '.fa.fa-plus.tool_element' ).click( add_button_action );
		$('.paragraph_app').keyup( resize_action );

		//Show options when hover
		$( '.row.element_box' ).hover( show_options_when_hover, hide_all_options );

	}

}//End of add_button_action function

function hide_all_options(){

	$('.row.element_box').find('.fa').hide();

}//End of hide_all_options function

function show_options_when_hover(  ){

	$(this).find('.fa').show();

}//End of show_options_when_hover function
