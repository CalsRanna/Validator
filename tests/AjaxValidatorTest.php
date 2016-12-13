<?php
/**
 * Created by PhpStorm.
 * User: cals
 * Date: 16-12-13
 * Time: 下午6:13
 */

use PHPUnit\Framework\TestCase;

class AjaxValidatorTest extends TestCase
{
    protected $validator;

    public function setUp()
    {
        $this->validator = new \Cals\Validator\AjaxValidator();
    }

    public function testValidateStore()
    {
        $values = [
            'username' => '1',
            'password' => '1'
        ];
        $this->validator->validate($values, 'user')->seeJson(['status' => 'failed']);
    }
}