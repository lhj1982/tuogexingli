$().ready(function(){
		
    $(".items li").hover(
    		function(){$(this).css("cursor","pointer");$(this).addClass("hover"); },
    		function(){$(this).css("cursor","default");$(this).removeClass("hover");});
    $(".items li").click(function(){ 
    		location = $(this).find("a.itemLink").attr("href");
    });
    
    
    $(".items div.dotline:last").remove();
    
    if($.cookie("notificationHide") != "true"){
    	$("#notification").show();
    } 
    
    $("#closeNotification").click(function(){
		$("#notification").hide();
		$.cookie("notificationHide", "true");
    });
       
});