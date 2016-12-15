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
        $this->assertTrue(true);
    }
}