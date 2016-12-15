<?php
/**
 * Created by PhpStorm.
 * User: cals
 * Date: 16-12-13
 * Time: 下午12:35
 */

return [
    /**
     * Rules for each resource.
     */
    'rules' => [
        'user' => [
            'username' => 'numeric|required',
            'password' => 'alpha_dash|between:6,18|required'
        ],
        //  Put your rules here ...

        /**
         * Extra rules while sometimes was true.
         */
        'sometimes' => [
            'user' => [
                'old_password' => 'alpha_dash|between:6,18|required'
            ],
            //  Put your extra rules here ...
        ]
    ],

    /**
     * Attributes for each field.
     */
    'attributes' => [
        'user' => [
            'username' => '用户名',
            'password' => '密码',
            'old_password' => '旧密码'
        ],
        //  Put your attributes which need be transformed here ...
    ]
];