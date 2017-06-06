<?php
/**
 * Created by PhpStorm.
 * User: cals
 * Date: 16-12-13
 * Time: 下午12:31
 */

namespace Cals\Validator;

use Validator;
use Illuminate\Http\JsonResponse;

class AjaxValidator
{
    /**
     * Validate the values use Validator.
     *
     * @param array $values
     * @param $resource
     * @param array $messages
     * @param bool $sometimes
     */
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
            (new JsonResponse(null, 422))
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', '*')
                ->setData(['errors' => $validator->errors()])
                ->send();
            exit(0);
        }
    }

    /**
     * Get rules from validator.php.
     *
     * @param $index
     * @return mixed
     */
    private function rules($index)
    {
        return config('validator.rules.' . $index);
    }

    /**
     * Get messages from validator.php.
     *
     * @param $messages
     * @return mixed
     */
    private function messages($messages)
    {
        if (!$messages) {
            return config('validator.messages');
        }
        return $messages;
    }

    /**
     * Get attributes from validator.php.
     *
     * @param $index
     * @return mixed
     */
    private function attributes($index)
    {
        return config('validator.attributes.' . $index);
    }
}