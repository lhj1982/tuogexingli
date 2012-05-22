$().ready(function(){

   $("<div class='dashline'></div>").insertAfter("#fieldset-aboutYou");    

   $.validator.addMethod('mobileSweden', function(phone_number, element) {
   	return this.optional(element) || phone_number.length > 9 &&
   	phone_number.match(/^((0|\+46)\d{9})$/);
   	}, 'Please specify a valid mobile number');

   
    $("#createAdAgencyForm").validate({
    	rules: {
		name: {
			required: true,
			minlength: 2,
			maxlength: 30
		},
		email: {
			required: true,
			email: true
		},
		mobile: {
			mobileSweden: true
		}
	},
	messages: {
		name: {
			required: "称呼不能为空哦！",
			minlength: "您的称呼这么短呀。。。至少要两个字哦！",
			maxlength: "这。。。来个30字以下的简称吧。。。"
		},
		email:{
			required: "电子邮箱不能为空哦！",
			email: "电子邮箱的格式好像不对耶。。。再检查检查？"
		} ,
		mobile: {
			mobileSweden: "电话号码格式好像不对呀。。。能打通哇。。。"
		}
	}
    });
});