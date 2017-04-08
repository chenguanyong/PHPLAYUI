<?php

namespace app\admin\validate;

use think\Validate;

class CurrencytreeValidate extends Validate
{
    protected $rule = [
        ['parentID', 'number', '该类型为数值'],
        ['name', 'max:64', '该类型为字符串'],
        ['css', 'alphaDash', '该类型为字符串'],
        ['leaf_node', 'number', '该类型为数值'],
        ['lft', 'number', '该类型为数值'],
        ['rgt', 'number', '该类型为数值'],
        ['IsDelete', 'number', '该类型为数值'],
        ['orderby', 'number', '该类型为数值'],

    ];

}