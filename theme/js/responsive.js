
$(function() {
	//insert plus pull down button before each submenu
//	$('+').insertBefore('.menu-globalnav-container > .menu > .menu-item > .sub-menu');
	// $('<span id="plus-pull-1"> + </span>').insertBefore('#menu-globalnav-1 > .sub-menu');

	// var mainmenu = document.getElementByID('sub-menu').getElementsByTagName('sub-menu'); 
    
    //  Sub menu navigation of Foundation Menu
     $(".normal-menu .foundation-menu-item").click(function(){

         if($(".sub-menu").css("display") == "none") {
         	$(".foundation-menu-item > a").html("Foundation -");
         }
         else{
         	$(".foundation-menu-item > a").html("Foundation +");
         }
         $(".sub-menu").toggle('slow');
     })

     $(".mobile-menu .foundation-menu-item").click(function(){

         if($(".sub-menu").css("display") == "none") {
            $(".foundation-menu-item > a").html("Foundation -");
         }
         else{
            $(".foundation-menu-item > a").html("Foundation +");
         }
         $(".sub-menu").toggle();
     })

     $("[id^=apply-pull]").click(function(){
        var suffix = $(this).attr('id').split('_').pop();
        if($("#" + "apply-mobile-hidden_" + suffix).css("display") == "none") {
            $(this).html('-');
         }
         else{
            $(this).html('+');
         }
         $("#" + "apply-mobile-hidden_" + suffix).toggle();

     })
 });