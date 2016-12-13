<?php
/**
 * Created by PhpStorm.
 * User: cals
 * Date: 16-12-13
 * Time: 下午12:31
 */

namespace Cals\Validator;

use Validator;

class AjaxValidator
{
    public function validate(array $values = [], $resource, $method = 'store')
    {
        $rules = config('validator.rules.' . $resource);
        $extraRules = config('validator.rules.whenUpdate.' . $resource);
        $messages = config('validator.messages');
        $attributes = array_keys($values);
        if($method === 'update'){
            $allRules = array();
            array_merge($allRules,$rules,$extraRules);
            $attributes = array_keys($allRules);
        }
        $validator = Validator::make($values, $rules, $messages, $attributes);
        $validator->sometimes(array_keys($extraRules), $extraRules, function ($method) use ($method) {
            return $method === 'update';
        });
        if ($validator->fails()) {
            response()->json(['status' => 'failed', 'code' => 422, 'message' => $validator->errors()])->send();
        }
    }
}