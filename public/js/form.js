
	//函数：设置下拉列表状态	
	function SetSelectState(select_id, option_value){
		
		if(option_value != ''){
			$('#' + select_id).val(option_value);
		}
		
		return $('#' + select_id).val();		
    }
	
	//函数：设置多选按钮状态
	function SetRadioState(radio_id, radio_value){
		
    	var ElementsRadio = document.getElementsByName(radio_id);
		var RadioLength = ElementsRadio.length;
		
		for(var i = 0; i < RadioLength; i ++){
			if(ElementsRadio[i].value == radio_value){
				ElementsRadio[i].checked = true;
			}else{
				ElementsRadio[i].checked = false;
			}
		}
		
		return radio_value;
		
    }

	//函数：获取单选按钮全部取值
	function GetRadiosValue(element_id){
		
		var stringRadiosValue = '';
		
		$('input[type="radio"][name="' + element_id + '"]:checked').each(
			function(){
				stringRadiosValue = stringRadiosValue + $(this).val();   
            }
        );
		
		//alert(stringRadiosValue);

		return stringRadiosValue;
		
	}

	
	//函数：设置多选按钮状态，单个
	function SetCheckboxState(checkbox_id, checkbox_value){
		
		if(checkbox_value == 1){
			$("#" + checkbox_id).prop("checked", true);
		}else{
			$("#" + checkbox_id).prop("checked", false);
		}
		
		return $("#" + checkbox_id).prop("checked");
		
    }
	
	//函数：获取多选按钮状态，单个
	function GetCheckboxState(checkbox_id){
		
		var checkbox_value = 0;
		
		if($("#" + checkbox_id).prop("checked") == true){
			checkbox_value = 1;
		}
		
		return checkbox_value;
		
	}
	
	//函数：设置多选按钮状态，一组
	function SetCheckboxsState(element_id, value_list){
		
		var stringCheckboxsValue = '';
		var intCount = 0;
		
		//alert('SetCheckboxsState() start!');
		
		$('input[type="checkbox"][name="' + element_id + '"]').each(
			function(){
				
				stringCheckBoxValue = $(this).val();
				
				if(value_list.indexOf(stringCheckBoxValue, 0) > -1){
					
					$(this).prop("checked", true);
					intCount = intCount + 1;
					
				}else{
					
					$(this).prop("checked", false);
					
				}
				
				//alert('SetCheckboxsState() sub function!');

            }
        );
		
		//alert('SetCheckboxsState() end!');
		
		//alert('return ' + intCount + '.');

		return intCount;
		
	}	

	//函数：获取多选按钮全部取值
	function GetCheckboxsValue(element_id){
		
		var stringCheckboxsValue = '';
		
		$('input[type="checkbox"][name="' + element_id + '"]:checked').each(
			function(){
				stringCheckboxsValue = stringCheckboxsValue + $(this).val();   
            }
        );

		return stringCheckboxsValue;
		
	}
	
	//函数：检查是否为空，为空时返回true，不为空时返回false
	function StringCheckIsEmpty(stringChecked){
		
		if(stringChecked == '' || stringChecked == null){
			return true;
		}
		
		return false;
		
	}			

	//函数：检查是否含有特殊字符，含特殊字符返回true，不含特殊字符返回false
	function StringCheckHaveSpecialCharacter(stringChecked){
		
		//alert(stringChecked);
		
		//为空时，不再检查，直接返回false
		if(StringCheckIsEmpty(stringChecked) == true){
			return false;
		}
		
		//正则表达式
		var reg = new RegExp('(\'|"|\\?){1}', 'g');
			
		//从首字符开始匹配
		reg.lastIndex = 0;
		
		//alert(reg.test(stringChecked));
		
		//检查匹配结果，匹配成功时，直接返回true
		if(reg.test(stringChecked) == true){
			return true;
		}

		return false;
		
	}

	//函数：检查是否为整数，是返回true，否则返回false
	function StringCheckIsInteger(stringChecked){
		
		//alert(stringChecked);
		
		//为空时，不再检查，直接返回false
		if(StringCheckIsEmpty(stringChecked) == true){
			return false;
		}
		
		//正则表达式
		var reg = new RegExp('^(\\+|-)?(\\d){1,}$', 'g');
			
		//从首字符开始匹配
		reg.lastIndex = 0;
		
		//alert(reg.test(stringChecked));
		
		//检查匹配结果，匹配成功时，直接返回true
		if(reg.test(stringChecked) == true){
			return true;
		}

		return false;
		
	}

	//函数：检查是否是小数，是返回true，否则返回false
	function StringCheckIsDecimal(stringChecked){
		
		//alert(stringChecked);
		
		//为空时，不再检查，直接返回false
		if(StringCheckIsEmpty(stringChecked) == true){
			return false;
		}
		
		//正则表达式
		var reg = new RegExp('^(\\+|-)?(\\d){1,}\\.(\\d){1,}$', 'g');
			
		//从首字符开始匹配
		reg.lastIndex = 0;
		
		//alert(reg.test(stringChecked));
		
		//检查匹配结果，匹配成功时，直接返回true
		if(reg.test(stringChecked) == true){
			return true;
		}

		return false;
		
	}

	//函数：检查是否为日期格式xxxx-xx-xx，是则返回true，不是则返回false
	function StringCheckIsDate(stringChecked){

		//为空时，不再检查，直接返回false
		if(StringCheckIsEmpty(stringChecked) == true){
			return false;
		}
		
		//alert(stringChecked);
		
		//---------------------------------------------------------------
		//利用正则表达式进行形式检查，2010-12-21

		//正则表达式
		var reg = new RegExp('^(20\\d{2})-((0[1-9])|(1(0|1|2)))-(0[1-9]|((1|2)[0-9])|3[0-1])$');
		
		//从首字符开始匹配
		reg.lastIndex=0;
		
		//获取表单域值并匹配
		var arrayDate = stringChecked.match(reg);
		
		//检查匹配结果，无匹配结果则返回false
		if(arrayDate == null){

			//输出提示
			alert('提示：日期格式应为“2010-12-21"，年份应大于2000，月份不足两位请补零。');

			return false;
		}
		
		//---------------------------------------------------------------
		//日期各位数字的有效性检查
		
		//alert(arrayDate[1] + '-' + arrayDate[2] + '-' + arrayDate[6]);
		
		//年月日
		var intYear = parseInt(arrayDate[1], 10);
		var intMonth = parseInt(arrayDate[2], 10);
		var intDay = parseInt(arrayDate[6], 10);
		
		//alert(intYear + '-' + intMonth + '-' + intDay);
		
		//月、日数字有效性检查	
		switch(intMonth){
			
			//以下月度为31天
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12:
			
				//月份1、3、5、7、8、10、12的天数不能超过31天，否则返回fasle
				if(intDay > 31){

					//输出提示
					alert('提示：月份1、3、5、7、8、10、12的天数不能超过31天。');

					return false;

				}
				
				break;
				
			case 2:
			
				//闰年2月份天数不能超过29天	，否则返回fasle
				if(intYear % 4 == 0 && intDay > 29){

					//输出提示
					alert('提示：闰年2月份天数不能超过29天。');

					return false;
					
				//非闰年2月份天数不能超过28天，否则返回fasle
				}else if(intYear % 4 != 0 && intDay > 28){
					
					//输出提示
					alert('提示：非闰年2月份天数不能超过28天。');
					
					return false;

				}
				
				break;
			
			case 4:
			case 6:
			case 9:
			case 11:
			
				//月份2、4、6、9、11的天数不能超过30天，否则返回fasle
				if(intDay > 30){

					//输出提示
					alert('提示：月份2、4、6、9、11的天数不能超过30天。');

					return false;
					
				}
				
				break;
				
			default:

				//输出提示
				alert('提示：月份数字取值范围为1-12。\n（当前数值为' + intMonth + '）');

				return false;
				
		}
		
		return true;

	}

	//函数：计算日期之间的时间差，日期格式，2010-12-21，返回结果单位为毫秒
	function DateDiff(stringDateStart, stringDateEnd){
		
		var arrayDateStart = stringDateStart.split('-');
		var dateStart = new Date(arrayDateStart[0], arrayDateStart[1], arrayDateStart[2]);
		var intStart = dateStart.getTime();

		var arrayDateEnd = stringDateEnd.split('-');
		var dateEnd = new Date(arrayDateEnd[0], arrayDateEnd[1], arrayDateEnd[2]);
		var intEnd = dateEnd.getTime();
		
		var intDateDiff = intEnd - intStart;
		
		return intDateDiff;

	}

	//函数：检查表单域值，是否为空，是否含有特殊字符
	function FormCheckText(element_id, element_name, can_empty, can_special_character){
		
		//获取表单域值
		var stringChecked = $("#" + element_id).val();
		
		//检查是否为空
		if(stringChecked == ''){
			
			//不能为空
			if(can_empty == true){
				return true;
			}
				
			//输出提示
			alert('提示：请填写/选择【' + element_name + '】！');
				
			//输入焦点定位
			$("#" + element_id).focus();				
				
			return false;
			
		}

		//检查是否含有特殊字符
		if(StringCheckHaveSpecialCharacter(stringChecked) == true){
			
			//不能有特殊字符
			if(can_special_character == true){
				return true;				
			}

			//输出提示
			alert('提示：【' + element_name + '】不能包含单引号、引号、问号等特殊字符！');

			//输入焦点定位
			$("#" + element_id).focus();

			return false;
			
		}
		
		return true;
		
	}

	//函数：检查表单域值，是否为空，是否含有特殊字符，是否超过长度
	function FormCheckTextLengthLimited(element_id, element_name, can_empty, can_special_character, length_limited){

		//获取表单域值
		var stringChecked = $("#" + element_id).val();
		
		//执行基础检查
		if(FormCheckText(element_id, element_name, can_empty, can_special_character) == false){
			return false;
		}

		//执行长度检查
		if(StringCheckIsEmpty(stringChecked) == false && stringChecked.length > length_limited){

			//输出提示
			alert('提示：【' + element_name + '】长度不能超过' + length_limited + '！');
			return false;
		}		
		
	}

	//函数：检查表单域值，是否为整数
	function FormCheckInteger(element_id, element_name, can_empty){

		//检查是否合法字符串
		if(FormCheckText(element_id, element_name, can_empty, false) == false){
			return false;
		}

		//获取表单域值
		var stringChecked = $("#" + element_id).val();
	
		//检查是否日期格式
		if(StringCheckIsEmpty(stringChecked) == false && StringCheckIsInteger(stringChecked) == false){

			//输出提示
			alert('提示：【' + element_name + '】格式错误！\n（仅接收整数）');
					
			//输入焦点定位
			$("#" + element_id).focus();		

			return false;

		}
		
		return true;

	}

	//函数：检查表单域值，是否为小数
	function FormCheckDecimal(element_id, element_name, can_empty){

		//检查是否合法字符串
		if(FormCheckText(element_id, element_name, can_empty, false) == false){
			return false;
		}

		//获取表单域值
		var stringChecked = $("#" + element_id).val();
	
		//alert(stringChecked);
		
		//检查是否小数格式
		if(StringCheckIsEmpty(stringChecked) == false && StringCheckIsDecimal(stringChecked) == false){

			//输出提示
			alert('提示：【' + element_name + '】格式错误！\n（仅接受小数。）');
					
			//输入焦点定位
			$("#" + element_id).focus();		

			return false;

		}
		
		return true;

	}	

	//函数：检查表单域值，是否为数字
	function FormCheckNumber(element_id, element_name, can_empty){

		//检查是否合法字符串
		if(FormCheckText(element_id, element_name, can_empty, false) == false){
			return false;
		}

		//获取表单域值
		var stringChecked = $("#" + element_id).val();
	
		//alert(stringChecked + '-' + StringCheckIsInteger(stringChecked) + '-' + StringCheckIsDecimal(stringChecked));
		
		//检查是否日期格式
		if(StringCheckIsEmpty(stringChecked) == false && StringCheckIsInteger(stringChecked) == false && StringCheckIsDecimal(stringChecked) == false){

			//输出提示
			alert('提示：【' + element_name + '】格式错误！\n（仅接收数字）');
					
			//输入焦点定位
			$("#" + element_id).focus();		

			return false;

		}
		
		return true;

	}
	
	//函数：检查表单域值，是否为日期格式，2010-12-21
	function FormCheckDate(element_id, element_name, can_empty){

		//获取表单域值
		var stringChecked = $("#" + element_id).val();
		
		//alert(stringChecked);
		
		//检查是否合法字符串
		if(FormCheckText(element_id, element_name, can_empty, false) == false){
			return false;
		}
		
		//alert(stringChecked);
		
		//检查是否日期格式
		if(StringCheckIsEmpty(stringChecked) == false && StringCheckIsDate(stringChecked) == false){

			//输出提示
			alert('提示：【' + element_name + '】格式错误！仅接受形如“2010-12-21"的合法日期。');
					
			//输入焦点定位
			$("#" + element_id).focus();		

			return false;

		}
		
		return true;

	}
	
	//函数：检查表单域值，单选，是否选择
	function FormCheckRadios(element_id, element_name, can_empty){

		//获取表单域值
		var stringRadiosValue = GetRadiosValue(element_id);
		
		//alert(stringRadiosValue);
		
		//检查是否选择
		if(can_empty == false && (stringRadiosValue == null || stringRadiosValue == '')){

			//输出提示
			alert('提示：请选择【' + element_name + '】！');
					
			//输入焦点定位
			$("#" + element_id).focus();

			return false;

		}
		
		return true;

	}
	
	//函数：检查表单域值，多选，是否选择
	function FormCheckCheckboxs(element_id, element_name, can_empty){

		//获取表单域值
		var stringChecboxsValue = GetCheckboxsValue(element_id);
		
		//alert(stringChecboxValue);
		
		//检查是否选择
		if(can_empty == false && (stringChecboxsValue == null || stringChecboxsValue == '')){

			//输出提示
			alert('提示：请选择【' + element_name + '】！');
					
			//输入焦点定位
			$("#" + element_id).focus();

			return false;

		}
		
		return true;

	}
	
	//函数：检查字符串是否含有汉字
	function StringCheckHasChinese(stringChecked){
		
		var stringReg = /[\u4E00-\u9FA5]/g;
		
		if (stringReg.test(stringChecked)){
			return true;
		}else{
			return false;
		}
		
	}
	
	//函数：检查表单域是否含有汉字
	function FormCheckHasChinese(element_id, element_name, can_has_chinese){
		
		//获取表单域值
		var stringChecked = $("#" + element_id).val();
		
		var booleanHasChinese = StringCheckHasChinese(stringChecked);
		
		if(booleanHasChinese == true && can_has_chinese == false){
			
			//输出提示
			alert('提示：【' + element_name + '】不能含有汉字！');
			
			return false;
			
		}

		return true;

	}	