
<p align="center">
    <img width="300px" src="resources/img/OpenPayroll.png" alt="OpenPayroll"/>
</p>

[![Build Status](https://travis-ci.org/cleaniquecoders/open-payroll.svg?branch=master)](https://travis-ci.org/cleaniquecoders/open-payroll) [![Latest Stable Version](https://poser.pugx.org/cleaniquecoders/open-payroll/v/stable)](https://packagist.org/packages/cleaniquecoders/open-payroll) [![Total Downloads](https://poser.pugx.org/cleaniquecoders/open-payroll/downloads)](https://packagist.org/packages/cleaniquecoders/open-payroll) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/cleaniquecoders/open-payroll/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/cleaniquecoders/open-payroll/?branch=master) [![License](https://poser.pugx.org/cleaniquecoders/open-payroll/license)](https://packagist.org/packages/cleaniquecoders/open-payroll)

## About Open Payroll

Open Payroll is an Open Source Initiative for Payroll System - which means you can grab the code to be use in your exisitng Laravel application.

Following are the features provided:

- Multiple Earning and Deductions, based on organisation or employee
- Automated Payroll Calculation using Payroll Scheduler
- Each payroll will require at least a reviewer and an approver 
- Customisable Payslip Design
- E-mail / Export the payslip to the employee
- Payroll Report for Administrator
- Payroll Report for Employee
- Custom Earnings and Deductions 
- Customasible earnings and deductions calculation process

## Demo Site

Youn can checkout the demo [here](https://open-payroll.cleaniquecoders.com/).

## Installation

1. In order to install `cleaniquecoders/open-payroll` in your Laravel project, just run the *composer require* command from your terminal:

```
$ composer require cleaniquecoders/open-payroll
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

Thank you for considering contributing to the `cleaniquecoders/open-payroll`!

### Bug Reports

To encourage active collaboration, it is strongly encourages pull requests, not just bug reports. "Bug reports" may also be sent in the form of a pull request containing a failing test.

However, if you file a bug report, your issue should contain a title and a clear description of the issue. You should also include as much relevant information as possible and a code sample that demonstrates the issue. The goal of a bug report is to make it easy for yourself - and others - to replicate the bug and develop a fix.

Remember, bug reports are created in the hope that others with the same problem will be able to collaborate with you on solving it. Do not expect that the bug report will automatically see any activity or that others will jump to fix it. Creating a bug report serves to help yourself and others start on the path of fixing the problem.

## Coding Style

`cleaniquecoders/open-payroll` follows the PSR-2 coding standard and the PSR-4 autoloading standard. 

You may use PHP CS Fixer in order to keep things standardised. PHP CS Fixer configuration can be found in `.php_cs`.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).