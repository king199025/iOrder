$(document).ready(function(){

	 //$('.link__waiting_edit').click(function() {
	 $(document).on('click', '.link__waiting_edit', function(){
		 $('.waiting__popup').show();
	 });




	 /*$('.link__stock_edit').click(function() {*/
	 $(document).on('click', '.link__stock_edit', function(){
	 	$('.stock__popup_edit').show();
	 });

	 $('.link_address').click(function() {
	 	$('.stock__popup_address').show();
	 });

	 $('.choose-address__add').click(function() {

		 $("input[name='first_name']").val('');
		 $("input[name='last_name']").val('');
		 $("input[name='address']").val('');
		 $("input[name='zip_code']").val('');
		 $("input[name='city']").val('');
		 $("input[name='country']").val('');
		 $("input[name='phone']").val('');
		$('.jobAddress').removeClass('editAddressBtn');
		$('.jobAddress').addClass('createAddress');
	 	$('.stock__popup_address').hide();
	 	$('.stock__popup_address_add').show();
	 });

	 $('.popup__back').click(function() {
	 	$('.stock__popup_address_add').hide();
	 	$('.stock__popup_address').show();
	 });

	 $('.link_comment').click(function() {
	 	$('.stock__popup_comment').show();
	 });

	 $('.popup__close').click(function() { 
	 	$('.popup').hide(); 
	 });



	//Accordion script for shipped page
	var shippedAccordion = document.getElementsByClassName("shipped");

	for (var i = 0; i < shippedAccordion.length; i++) {
		shippedAccordion[i].onclick = function() {

			this.classList.toggle("active");

			this.nextElementSibling.classList.toggle("show");
		}
	}

});

