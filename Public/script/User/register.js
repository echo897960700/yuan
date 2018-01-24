$(function(){
	$('#regdata').validationEngine({
		'custom_error_messages':{
			'#username': {
				'required' : {
					'message': '* 请输入用户名'
				}
			},
			'#password': {
				'required' : {
					'message': '* 请输入密码'
				}
			},
			'#rqpassword': {
				'required' : {
					'message': '* 请确认你的密码'
				}
			},
			'#mail': {
				'required' : {
					'message': '* 请输入你的邮箱'
				}
			},
			'#truename': {
				'required' : {
					'message' : '* 请输入姓名'
				},
			},

		},
		'onValidationComplete' : function(form,status){
			if (status === true) {
				var regMsg = dialog({
    				content: '正在注册中，请稍等'
				}).showModal();
				
				var $regdata = $('#regdata').serialize();

				$.post(root+'	/Home/User/doRegister',$regdata,function(data,status){
					if (data.status == 0) {
						D('<span style="color:red;">'+data.massge+'</span>','right').show();
					}else{
						regMsg.close();
						var message = dialog({
				            title : '提示',
				            content : data.msg,
				            width : 347,
				            height: 180,
				        	okValue:'确定',
				        	cancelValue :'取消',
				        	ok:function(){
				        		this.close();
				        		location.href = root+'/Home/User/login';
				        	},
				            cancel:function(){
				            	this.close();
				        		location.href = root+'/Home/User/login';
				            }
				        });
				        message.showModal();
					}
				})
			}
		},
		// 'ajaxFormValidation' : true,
		'ajaxFormValidationMethod' : 'post'
}); 

	// 
	$(document).on('click','#getVerifyCode',function(){
		$('#verifyCodeImg').attr('src',root+'/Home/User/getVerifyCode?r='+Math.random());
	})

	$(document).on('change','.user-class',function(){
		var $selectedValue = $(this).val();
		var $selectedId    = $(this).attr('id');
		switch($selectedId)
		{
			case 'user-dep' : sendAjax('department',$selectedValue,$selectedId); break;
			case 'user-spe' : sendAjax('specialty',$selectedValue,$selectedId);  break;
		}
	});


	// 快速创建气泡提示
	function D(content,direction){
		var d = dialog({
			align : direction,
			content : content,
		})

		setTimeout(function () {
    		d.close();
		}, 3000);

		return d;
	}
})