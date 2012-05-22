$().ready(function(){
	
	if ($("#sendEmailForm ul.errors").length>0)
		$("#sendEmailSection").show();
	
	$("#nameLink,#sendEmailLink").click(function(){
		$("#sendEmailSection").slideDown();
	});
	

	$("#closeSendEmail")
		.hover(function(){$(this).css('cursor','pointer');},function(){$(this).css('cursor','default');})
		.click(function(){$("#sendEmailSection").slideUp();});
	
    $("#sendEmailForm").validate({
    	rules: {
		name: {
			required: true
		},
		email: {
			required: true,
			email: true
		},
		body: {
			required: true
		}
	},
	messages: {
		name: {
			required: "称呼不能为空哦！"
		},
		email:{
			required: "电子邮箱不能为空哦！",
			email: "电子邮箱的格式好像不对耶。。。再检查检查？"
		} ,
		body:{
			required: "不可以发空邮件哦！"
		} 
	}
    });
    
    
});