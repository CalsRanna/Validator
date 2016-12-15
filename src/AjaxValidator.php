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
    public function validate(array $values = [], $resource, array $messages = [], $sometimes = false)
    {
        $rules = $this->rules($resource);
        $messages = $this->messages($messages);
        $attributes = $this->attributes($resource);
        $validator = Validator::make($values, $rules, $messages, $attributes);
        if ($sometimes) {
            $extraRules = $this->rules('sometimes' . $resource);
            $validator->sometimes(array_keys($extraRules), $extraRules, function () use ($sometimes) {
                return $sometimes;
            });
        }
        if ($validator->fails()) {
            response()->json(['status' => 'failed', 'code' => 422, 'message' => $validator->errors()])->send();
            exit(0);
        }
    }

    private function rules($index)
    {
        return config('validator.rules.' . $index);
    }

    private function messages($messages)
    {
        if (!$messages) {
            return config('validator.messages');
        }
        return $messages;
    }

    private function attributes($index)
    {
        return config('validator.attributes.' . $index);
    }
}