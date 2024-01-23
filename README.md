# chatgpt-api

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://img.shields.io/travis/echo909/chatgpt-api.svg?style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/echo909/chatgpt-api.svg?style=flat-square)](https://packagist.org/packages/echo909/chatgpt-api)


## Install

```bash
composer require echo909/chatgpt-api
```


## Usage
```php
$gpt = new ChatgptApi;
$result = $gpt->sendPrompt('Your question to gpt');
```
or use predifined templates to prefix your prompt
```php
$result = $gpt->withTemplate('email')->sendPrompt('keyword');
```


## Testing

Run the tests with:

```bash
vendor/bin/phpunit
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Security

If you discover any security-related issues, please email echo909azu@gmail.com instead of using the issue tracker.


## License

The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.
