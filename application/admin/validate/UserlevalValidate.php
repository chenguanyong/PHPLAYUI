<?php

namespace app\admin\validate;

use think\Validate;

class UserlevalValidate extends Validate
{
    protected $rule = [
        ['leval_name','max:30','该类型为字符串'],
        ['leval_points','number','该类型为数值'],
        ['status','number','该类型为数值'],    
    ];

}