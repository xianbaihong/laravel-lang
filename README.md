<h1 align="center">Laravel-lang</h1>
<p align="center">基于 <a href="https://github.com/Laravel-Lang/lang">Laravel-Lang/lang</a> 的Laravel应用程序支持75种语言。
<p align="center"><a href="https://github.com/xianbaihong/laravel-lang"><img alt="For Laravel 5" src="https://img.shields.io/badge/laravel-ready-green.svg" style="max-width:100%;"></a>
<a href="https://github.com/xianbaihong/laravel-lang"><img alt="For Lumen 5" src="https://img.shields.io/badge/lumen-ready-green.svg" style="max-width:100%;"></a>
<a href="https://packagist.org/packages/xianbaihong/laravel-lang"><img alt="Latest Stable Version" src="https://img.shields.io/packagist/v/xianbaihong/laravel-lang.svg" style="max-width:100%;"></a>
<a href="https://packagist.org/packages/xianbaihong/laravel-lang"><img alt="Latest Unstable Version" src="https://img.shields.io/packagist/vpre/xianbaihong/laravel-lang.svg" style="max-width:100%;"></a>
<a href="https://packagist.org/packages/xianbaihong/laravel-lang"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/xianbaihong/laravel-lang.svg?maxAge=2592000" style="max-width:100%;"></a>
<a href="https://packagist.org/packages/xianbaihong/laravel-lang"><img alt="License" src="https://img.shields.io/packagist/l/xianbaihong/laravel-lang.svg?maxAge=2592000" style="max-width:100%;"></a></p>

# Install

| Laravel version | Composer command                              |
| --------------- | --------------------------------------------- |
| Laravel 9.x     | `composer require xianbaihong/laravel-lang:~6.0` |
| Laravel 7.x-8.x | `composer require xianbaihong/laravel-lang:~5.0` |
| Laravel 6.x     | `composer require xianbaihong/laravel-lang:~4.0` |
| Laravel 5.8     | `composer require xianbaihong/laravel-lang:~3.0` |
| Laravel 5.1-5.7 | `composer require xianbaihong/laravel-lang:~2.0` |
| Laravel 5       | `composer require xianbaihong/laravel-lang:~1.0` |

```shell
composer require "xianbaihong/laravel-lang:~6.0"
```

#### Lumen

Add the following line to `bootstrap/app.php`:

```php
$app->register(Xianbaihong\LaravelLang\TranslationServiceProvider::class);
```

# Configuration

### Laravel

you can change the locale at `config/app.php`:

```php
'locale' => 'zh_CN',
```

### Lumen

set locale in `.env` file:

```
APP_LOCALE=zh_CN
```

# Usage

There is no difference with the usual usage.

If you need to add additional language content, Please create a file in the `resources/lang/{LANGUAGE}` directory.

### Add custom language items

Here, for example in Chinese:

`resources/lang/zh_CN/demo.php`:

```php
<?php

return [
    'user_not_exists'    => '用户不存在',
    'email_has_registed' => '邮箱 :email 已经注册过！',
];
```

Used in the template:

```php
echo trans('demo.user_not_exists'); // 用户不存在
echo trans('demo.email_has_registed', ['email' => 'anzhengchao@gmail.com']);
// 邮箱 anzhengchao@gmail.com 已经注册过！
```

### Replace the default language items partially

We assume that want to replace the `password.reset` message:

`resources/lang/zh_CN/passwords.php`:

```php
<?php

return [
    'reset' => '您的密码已经重置成功了，你可以使用新的密码登录了!',
];
```

You need only add the partials item what you want.

### publish the language files to your project `resources/lang/` directory

```shell
php artisan lang:publish [LOCALES] {--force}
```

examples:

```shell
php artisan lang:publish zh_CN,zh_HK,th,tk
```

# License

MIT
