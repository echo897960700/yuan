$(function () {

	//城市联动
	var province = '';
	$.each(city, function (i, k) {
		province += '<option value="' + k.name + '" index="' + i + '">' + k.name + '</option>';
	});
	$('select[name=province]').append(province).change(function () {
		var option = '';
		if ($(this).val() == '') {
			option += '<option value="">请选择</option>';
		} else {
			var index = $(':selected', this).attr('index');
			var data = city[index].child;
			for (var i = 0; i < data.length; i++) {
				option += '<option value="' + data[i] + '">' + data[i] + '</option>';
			}
		}
		
		$('select[name=city]').html(option);
	});

	//所在地默认选项
	address = address.split(' ');
	$('select[name=province]').val(address[0]);
	$.each(city, function (i, k) {
		if (k.name == address[0]) {
			var str = '';
			for (var j in k.child) {
				str += '<option value="' + k.child[j] + '" ';
				if (k.child[j] == address[1]) {
					str += 'selected="selected"';
				}
				str += '>' + k.child[j] + '</option>';
			}
			$('select[name=city]').html(str);
		}
	});


	//jQuery Validate 表单验证
	
	/**
	 * 添加验证方法
	 * 以字母开头，5-17 字母、数字、下划线"_"
	 */
	jQuery.validator.addMethod("user", function(value, element) {   
	    var tel = /^[a-zA-Z][\w]{4,16}$/;
	    return this.optional(element) || (tel.test(value));
	}, "以字母开头，5-17 字母、数字、下划线'_'");

	$('form[name=editPwd]').validate({
		errorElement : 'span',
		success : function (label) {
			label.addClass('success');
		},
		rules : {
			old : {
				required : true,
				user : true
			},
			new : {
				required : true,
				user : true
			},
			newed : {
				required : true,
				equalTo : "#new"
			}
		},
		messages : {
			old : {
				required : '请填写旧密码',
			},
			new : {
				required : '请设置新密码'
			},
			newed : {
				required : '请确认密码',
				equalTo : '两次密码不一致'
			}
		}
	});
});