<?php
/**
 * Created by PhpStorm.
 * User: cals
 * Date: 16-12-13
 * Time: 下午12:35
 */

return [
    /**
     * Rules for each resource
     */
    'rules' => [
        'user' => [
            'username' => 'numeric|required',
            'password' => 'alpha_dash|between:6,18|required'
        ],
        //  Put your rules here ...
        'whenUpdate' => [
            'user' => [
                'old_password' => 'alpha_dash|between:6,18|required'
            ],
            //  Put your rules when update here ...
        ]
    ],

    /**
     * Message for each resource
     */
    'messages' => [
        'alpha' => ':attribute必须是字母',
        'alpha_dash' => ':attribute不能是字母、数字、破折号和下划线之外的其他字符',
        'alpha_num' => ':attribute必须是字母或者数字',
        'array' => ':attribute必须是PHP数组',
        'between' => ':attribute必须在 :min 和 :max 之间',
        'date' => ':attribute必须是一个有效日期',
        'digits' => ':attribute必须是 :size 位的数字',
        'digits_between:min,max' => ':attribute必须是 :min 到 :max 位的数字',
        'email' => ':attribute必须是合法的电子邮件地址',
        'exists' => ':table 表中不存在 :column 为 :attribute 的记录',
        'image' => ':attribute必须是图片',
        'integer' => ':attribute必须是整数',
        'max' => ':attribute必须小于 :max',
        'mimes' => ':attribute必须是：values中的一个',
        'min' => ':attribute必须大于 ：min',
        'numeric' => ':attribute必须是数值',
        'required' => ':attribute不能为空',
        'size' => ':attribute必须是 :size 位',
        'string' => ':attribute必须是字符串'
    ]
];