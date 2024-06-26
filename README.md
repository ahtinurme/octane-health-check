# A Laravel Health check to monitor Octane server

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ahtinurme/octane-health-check.svg?style=flat-square)](https://packagist.org/packages/ahtinurme/octane-health-check)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ahtinurme/octane-health-check/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ahtinurme/octane-health-check/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ahtinurme/octane-health-check/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ahtinurme/octane-health-check/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ahtinurme/octane-health-check.svg?style=flat-square)](https://packagist.org/packages/ahtinurme/octane-health-check)
---

This package contains a [Laravel Health](https://spatie.be/docs/laravel-health) check that monitors your Octane server. It can send you a notification when Octane server is not running.

```php
// typically, in a service provider

use Ahtinurme\OctaneCheck;
use Spatie\Health\Facades\Health;

Health::checks([
    OctaneCheck::new(),
]);
```

## Installation

You can install the package via composer:

```bash
composer require ahtinurme/octane-health-check
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Amir Sobhani](https://github.com/amirsobhani) - huge thanks for the initial code
- [Ahti Nurme](https://github.com/ahtinurme)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

