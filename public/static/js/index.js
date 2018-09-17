$(document).ready(function(){

	$('.main-item-1').mouseenter(function(){
		$(this).children('.main-item-parent').hide();
		console.log('wefw');

		$(this).children('.main-item-list-children').show();

	})
	$('.main-item-1').mouseleave(function(){
		$(this).children('.main-item-parent').show();
		$(this).children('.main-item-list-children').hide();

		
	})
})