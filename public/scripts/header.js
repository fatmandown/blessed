
function slideInLeft(callback) {

	$("#htext_1").addClass('slideInLeft');

}

function slideInRight() {
	$("#htext_2").addClass('slideInRight');
}

function slideIn() {

	slideInLeft().delay(1500).slideInRight();
}



$(document).ready(function() {


slideIn();


});