<?php

namespace app\admin\validate;

use think\Validate;

class MemberValidate extends Validate
{
    protected $rule = [
        ['username', 'unique:admin', '管理员已经存在'],
        ['username','alphaDash|max:20','该类型为字符串'],
        ['nickname','max:20','该类型为字符串'],
        ['password','alphaDash','该类型为字符串'],
        ['avatar','max:250','该类型为字符串'],
        ['sex','alphaNum','该类型为字符串'],
        ['email','email','请输入正确的邮箱格式'],
        ['email_code','alphaNum','该类型为字符串'],
        ['phone','alphaNum','该类型为数值'],
        ['job','max:32','该类型为字符串'],
        ['integral','number','该类型为字符串'],
    ];

}