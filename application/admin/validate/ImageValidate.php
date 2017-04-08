<?php

namespace app\admin\validate;
use think\Validate;

class ImageValidate extends Validate
{
    protected $rule = [
        ['name', 'unique:xx_image', '该名称已经存在'],
        ['Isrecommend', 'number', '该类型为数值'],  
        ['nodeID','number','该类型为数值'],
        ['path','max:250','路径为字符串类型'],
        ['type','number','该类型为字符串类型'], 
        ['width','number','宽度为数值类型'],     
        ['height','number','高度为数值类型'], 
        ['filepath','max:250','该类型为字符串类型'],
        ['Isstatus','number','该类型为数值'], 
        ['Ishot','number','该类型为数值'],     
        ['IsDelete','number','该类型为数值'],     
    ];

}