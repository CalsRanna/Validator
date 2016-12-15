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
        $rules = $this->rules($resource);
        $messages = $this->messages($resource);
        $attributes = $this->attributes($resource);
        $validator = Validator::make($values, $rules, $messages, $attributes);
        if ($sometimes) {
            $extraRules = $this->rules('sometimes' . $resource);
            $validator->sometimes(array_keys($extraRules), $extraRules, function ($execution) use ($sometimes) {
                return $execution;
            });
        }
        if ($validator->fails()) {
            response()->json(['status' => 'failed', 'code' => 422, 'message' => $validator->errors()])->send();
        }
    }

    private function rules($index)
    {
        return config('validator.rules.' . $index);
    }

    private function messages($index)
    {
        return config('validator.messages.' . $index);
    }

    private function attributes($index)
    {
        return config('validator.attributes.' . $index);
    }
}