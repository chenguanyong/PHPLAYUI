<?php

namespace app\admin\validate;

use think\Validate;

class DictionariesValidate extends Validate
{
    protected $rule = [
        
        ['name', 'max:64', '超过64个字了'],
        ['bianma', 'alphaDash', '该类型为字符串'],
        ['parentID', 'number', '该类型为数字1'],
        ['bz', 'max:128', '该类型为字符串2'],
        ['orderby', 'number', '该类型为数值3'],
        ['IsDelete', 'number', '该类型为数值4'],
        ['state', 'number', '该类型为数值5'],      
    ];

}