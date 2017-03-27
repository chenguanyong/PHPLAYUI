function getFormValue(){
	
var companyName =	$('#companyName').val();//获取归属公司id和值
var companyID =	$('#companyName').attr("data-companyID");
var officeName =	$('#officeName').val();//归属办公室
var officeNameID =	$('#officeName').attr("data-companyID");
var noID =	$('#no').val();//工号	
var loginName =	$('#loginName').val();//登录名
var name =	$('#name').val();//姓名
var newPassword =	$('#newPassword').val();//密码
var confirmNewPassword =	$('#confirmNewPassword').val();//重复密码
var email =	$('#email').val();//邮箱
var mobile =	$('#mobile').val();
var loginFlag =	$('#loginFlag').val();//是否允许登录
var userType =	$('#userType').val();//用户类型
var userRole =	$('[name=roleIdList]').childen();//用户角色
var remarks =	$('#remarks').val();//备注
	$.Post('../ff',{companyID:companyID,officeNameID:officeNameID,
	noID:noID,loginName:loginName,
	name:name,newPassword:newPassword,
	email:email,mobile:mobile,loginFlag:loginFlag,
	userType:userType,userRole:userRole,remarks:remarks}
	,function(data){
	alert(data);
		
	},'Json');
}