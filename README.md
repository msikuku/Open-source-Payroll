
[![Build Status](https://travis-ci.org/cleanique-coders/open-payroll.svg?branch=master)](https://travis-ci.org/cleanique-coders/open-payroll) [![Latest Stable Version](https://poser.pugx.org/cleanique-coders/open-payroll/v/stable)](https://packagist.org/packages/cleanique-coders/open-payroll) [![Total Downloads](https://poser.pugx.org/cleanique-coders/open-payroll/downloads)](https://packagist.org/packages/cleanique-coders/open-payroll) [![License](https://poser.pugx.org/cleanique-coders/open-payroll/license)](https://packagist.org/packages/cleanique-coders/open-payroll)

## About Your Package

Tell people about your package

## Installation

1. In order to install `cleanique-coders/open-payroll` in your Laravel project, just run the *composer require* command from your terminal:

```
$ composer require cleanique-coders/open-payroll
```

2. Then in your `config/app.php` add the following to the providers array:

```php
CleaniqueCoders\OpenPayroll\OpenPayrollServiceProvider::class,
```

3. In the same `config/app.php` add the following to the aliases array:

```php
'OpenPayroll' => CleaniqueCoders\OpenPayroll\OpenPayrollFacade::class,
```

## Usage

## Test

To run the test, type `vendor/bin/phpunit` in your terminal.

To have codes coverage, please ensure to install PHP XDebug then run the following command:

```
$ vendor/bin/phpunit -v --coverage-text --colors=never --stderr
```

## Contributing

Thank you for considering contributing to the `cleanique-coders/open-payroll`!

### Bug Reports

To encourage active collaboration, it is strongly encourages pull requests, not just bug reports. "Bug reports" may also be sent in the form of a pull request containing a failing test.

However, if you file a bug report, your issue should contain a title and a clear description of the issue. You should also include as much relevant information as possible and a code sample that demonstrates the issue. The goal of a bug report is to make it easy for yourself - and others - to replicate the bug and develop a fix.

Remember, bug reports are created in the hope that others with the same problem will be able to collaborate with you on solving it. Do not expect that the bug report will automatically see any activity or that others will jump to fix it. Creating a bug report serves to help yourself and others start on the path of fixing the problem.

## Coding Style

`cleanique-coders/open-payroll` follows the PSR-2 coding standard and the PSR-4 autoloading standard. 

You may use PHP CS Fixer in order to keep things standardised. PHP CS Fixer configuration can be found in `.php_cs`.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).