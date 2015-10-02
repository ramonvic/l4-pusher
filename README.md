# L4Pusher - Laravel 4 Bridge for official pusher


[![Build Status](https://img.shields.io/travis/ramonvic/l4-pusher/master.svg?style=flat)](https://travis-ci.org/ramonvic/l4-pusher)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/ramonvic/l4-pusher.svg?style=flat)](https://scrutinizer-ci.com/g/ramonvic/l4-pusher/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/ramonvic/l4-pusher.svg?style=flat)](https://scrutinizer-ci.com/g/ramonvic/l4-pusher)
[![Latest Version](https://img.shields.io/github/release/ramonvic/l4-pusher.svg?style=flat)](https://github.com/ramonvic/l4-pusher/releases)
[![License](https://img.shields.io/packagist/l/ramonvic/l4-pusher.svg?style=flat)](https://packagist.org/packages/ramonvic/l4-pusher)

L4Pusher is a [Pusher](https://pusher.com/) bridge for Laravel 4 using the [official Pusher package](https://github.com/pusher/pusher-php-server).

[Pusher](http://pusher.com/) ([Documentation](http://pusher.com/docs)) is a simple hosted API 
for adding realtime bi-directional functionality via WebSockets to web and mobile apps, or 
any other Internet connected device.

---

```php
// Triggering events.
Pusher::trigger('my-channel', 'my_event', 'hello world');

// Get active channels
Pusher::get('/channels');
```

## Installation
Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
composer require ramonvic/l4-pusher
```

Add the service provider to ```config/app.php``` in the `providers` array.

```php
'Ramonvic\L4Pusher\PusherServiceProvider'
```

If you want you can use the [facade](http://laravel.com/docs/facades). Add the reference in ```config/app.php``` to your aliases array.

```php
'Pusher' => 'Ramonvic\L4Pusher\Facades\Pusher'
```
#### Looking for a Laravel 5 compatible version?

Please use [@vinkla's Laravel Pusher package](https://github.com/vinkla/pusher) instead.

## Configuration

L4Pusher requires configuration. To get started, you'll need to publish all vendor assets:

```bash
php artisan vendor:publish
```

This will create a `config/pusher.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

#### Default Connection Name

This option `default` is where you may specify which of the connections below you wish to use as your default connection for all work. Of course, you may use many connections at once using the manager class. The default value for this setting is `main`.

#### Pusher Connections

This option `connections` is where each of the connections are setup for your application. Example configuration has been included, but you may add as many connections as you would like.

## Usage

#### Facades\Pusher

This facade will dynamically pass static method calls to the `pusher` object in the ioc container class.

#### PusherServiceProvider

This class contains no public methods of interest. This class should be added to the providers array in `config/app.php`. This class will setup ioc bindings.

### Examples
Here you can see an example of just how simple this package is to use. Out of the box, the default adapter is `main`. After you enter your authentication details in the config file, it will just work:

```php
// You can alias this in config/app.php.
use Ramonvic\L4Pusher\Facades\Pusher;

Pusher::trigger('my-channel', 'my-event', ['message' => $message]);
// We're done here - how easy was that, it just works!

```

## Documentation
There are other classes in this package that are not documented here. This is because the package is a Laravel wrapper of [the official Pusher package](https://github.com/pusher/pusher-php-server).

## License

L4Pusher is licensed under [The MIT License (MIT)](LICENSE).