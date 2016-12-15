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
    public function validate(array $values = [], $resource, $sometimes = false)
    {
        $rules = config('validator.rules.' . $resource);
        $extraRules = config('validator.rules.whenUpdate.' . $resource);
        $messages = config('validator.messages');
        $validator = Validator::make($values, $rules, $messages);
        $validator->sometimes(array_keys($extraRules), $extraRules, function ($sometimes) use ($sometimes) {
            return $sometimes;
        });
        if ($validator->fails()) {
            response()->json(['status' => 'failed', 'code' => 422, 'message' => $validator->errors()])->send();
        }
    }
}