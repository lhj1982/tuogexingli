$().ready(function(){

   $("<div class='dashline'></div>").insertAfter("#fieldset-aboutYou");
    
    $("#createAdForm #type-want").click(function(){
    	$("#createAdForm #departure_time-label").hide();
    	$("#createAdForm #departure_time-element").hide();
    	$("#createAdForm #arrival_time-label label").text("最迟抵达时间");
    	$("#createAdForm #description-element p").text("具体描述，例如: 国内淘宝上买了些小东东，想请帮忙带过来，重量大概半公斤，100kr，价钱好商量，交个朋友，以后我也帮你带哇！！谢啦！！");   	
    });
    
    $("#createAdForm #type-lease").click(function(){
    	$("#createAdForm #departure_time-label").show();
    	$("#createAdForm #departure_time-element").show();
    	$("#createAdForm #arrival_time-label label").text("抵达时间");
    	$("#createAdForm #description-element p").text("具体描述，例如: 小物件50kr起带，超过1公斤的，每超过一公斤加100kr，主要是想交个朋友，下次也帮我带哈~~也可以帮邮寄！"); 
    });
   
    if($("#createAdForm #type-lease").attr("checked")){
    	$("#createAdForm #type-lease").click();
    }
    
    if($("#createAdForm #type-want").attr("checked")){
    	$("#createAdForm #type-want").click();
    }
    
    $.validator.addMethod('cityNotEmpty', function(value) {
    	return (value!= 0);
    	}, '这个一定要选哦~~');

   //  Method for date format yyyy-mm-dd
    jQuery.validator.addMethod(
    		"dateITA",
    		function(value, element) {
    			var check = false;
    			var re = /^\d{4}-\d{2}-\d{2}$/;
    			if( re.test(value)){
    				var adata = value.split('-');
    				var gg = parseInt(adata[2],10);
    				var mm = parseInt(adata[1],10);
    				var aaaa = parseInt(adata[0],10);
    				var xdata = new Date(aaaa,mm-1,gg);
    				
    				if ( ( xdata.getFullYear() == aaaa ) && ( xdata.getMonth () == mm - 1 ) && ( xdata.getDate() == gg ) )
    					check = true;
    				else
    					check = false;
    			} else
    				check = false;
    			return this.optional(element) || check;
    		}, 
    		"时间不对哦，请按格式  2012-12-12"
    	);
 
    // Method for lease required 
    jQuery.validator.addMethod(
    		"requiredDeparture",
    		function(value) {
    			if($("#createAdForm #type-lease").attr("checked") && value.length < 1)
    				return false;
    			return true;
    		}, 
    		"告诉我们你的飞机啥时候飞吧~~"
    	);

    
    $("#createAdForm").validate({
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
		departure_time: {
			requiredDeparture: true,
			dateITA: true
		},
		arrival_time: {
			required: true,
			dateITA: true
		},
		from_country:{
			cityNotEmpty: true
		},
		from_city:{
			cityNotEmpty: true
		},
		to_country:{
			cityNotEmpty: true
		},
		to_city:{
			cityNotEmpty: true
		},
		weight:{
			required:true,
			number:true
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
		departure_time: {
			dateITA: "格式好像不对哦。。。参考2010-10-10"
		},
		arrival_time: {
			required: "哪天抵达呢？",
			dateITA: "格式好像不对哦。。。参考2010-10-10"
		},
		weight:{
			required:"填个整数吧。。。小于一公斤就填0",
			number:"填个整数吧。。。小于一公斤就填0"
		}
	}
    });
});