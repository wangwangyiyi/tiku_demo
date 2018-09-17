$(document).ready(function(){

	$('.question-main').mouseenter(function(){
		$(this).css('background',"#006699");
		console.log($('.question-pic').height());

	})
	$('.question-main').mouseout(function(){
		$(this).css('background',"white");
		console.log($('.question-pic').height());
		
	})
})