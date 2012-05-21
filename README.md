# SendGrid Bundle

Bundled up SendGrid PHP library for Laravel. [SendGrid](http://sendgrid.com/) is a cloud-based email service which allows you to send emails from your applications in a reliable way.

For documentation and examples [see the sendgrid-php library](https://github.com/sendgrid/sendgrid-php) or README.git file in the bundle.

## Installation

```bash
php artisan bundle:install sendgrid
```

## Bundle Registration

Add the following to your **application/bundles.php** file:

```php
    'sendgrid' => array(
        'auto' => true
    ),
```

You will also need to add your username and password in ```config/options.php```

## Usage

The library has been modified to use a config file for username & password so you don't need to use it every time. Please keep this in mind when following examples from the original documentation.

Following example will get you started, shamelessly copied from the sendgrid-php docs.


```php
$sendgrid = new SendGrid('username', 'password'); // This is original
$sendgrid = new SendGrid(); // For Laravel bundle users
```

Create a new SendGrid Mail object and add your message details

```php
$mail = new SendGrid\Mail();
$mail->addTo('foo@bar.com')->
       setFrom('me@bar.com')->
       setSubject('Subject goes here')->
       setText('Hello World!')->
       setHtml('<strong>Hello World!</strong>');
```