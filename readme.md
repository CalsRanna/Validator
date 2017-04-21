# Validator

[![Build Status](https://travis-ci.org/Su9Tail/Validator.svg?branch=master)](https://travis-ci.org/Su9Tail/Validator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Su9Tail/Validator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Su9Tail/Validator/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Su9Tail/Validator/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Su9Tail/Validator/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Su9Tail/Validator/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Su9Tail/Validator/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/cals/validator/v/stable)](https://packagist.org/packages/cals/validator)
[![Total Downloads](https://poser.pugx.org/cals/validator/downloads)](https://packagist.org/packages/cals/validator)
[![Latest Unstable Version](https://poser.pugx.org/cals/validator/v/unstable)](https://packagist.org/packages/cals/validator)
[![License](https://poser.pugx.org/cals/validator/license)](https://packagist.org/packages/cals/validator)

Validator is designed for Laravel when use ajax. Validator is a simple encapsulation of Illuminate\Contracts\Validation\Factory in Laravel, which excepted validating data easier.

## Install

You can simply install Validator use composer.

```Bash
composer require cals/validator
```

And then add the `Cals\Validator\ValidatorServiceProvider::class` to your `config/app.php` providers array.

```PHP
Cals\Validator\ValidatorServiceProvider::class
```

## Configuration

You have to publish the config using this command:

```Bash
php artisan vendor:publish --tag="validator"
```

You should put your rules and messages in it.

## Usage

Validator provides a simple way to validate data, you can simply use it anywhere you want.

`validate(array $values = [], $resource, array $messages = [], $sometimes = false)`

`$values` is the data you wish to validate, `$resource` is one of your key in `rules` which contained in `validator.php`. And you can set messages while validating fails to return by using `$message`.When `$sometimes` was `true`, rules in sometimes would be used.

When validate failed, Validator will send a json response automatically.The returned data is like this.

```JSON
{
    "message": {
        "username": [
            "用户名不能为空"
        ],
        "password": [
            "密码不能是字母、数字、破折号和下划线之外的其他字符",
            "密码必须在 6 到 18 位之间"
        ]
    }
}
```

## Example

Validator suggest using like this.

```PHP
<?php

namespace App\Http\Controllers;

use Cals\Validator\AjaxValidator;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    private $validator;
    public function __construct(AjaxValidator $validator)
    {
        $this->validator = $validator;
    }

    public function index(Request $request)
    {
        $values = $request->all();
        $this->validator->validate($values,'user');
    }
}

```

## License

The Validator is open-sourced library licensed under the [MIT license](http://opensource.org/licenses/MIT).