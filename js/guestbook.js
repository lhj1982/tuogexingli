$().ready(function(){
		
    $(".items div.dotline:last").remove();
    

    $("#guestForm").validate({
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
			required: "不可以发空留言哦！"
		} 
	}
    });
});