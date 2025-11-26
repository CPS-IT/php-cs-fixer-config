<div align="center">

# PHP-CS-Fixer config

[![Coverage](https://img.shields.io/coverallsCoverage/github/CPS-IT/php-cs-fixer-config?logo=coveralls)](https://coveralls.io/github/CPS-IT/php-cs-fixer-config)
[![CGL](https://img.shields.io/github/actions/workflow/status/CPS-IT/php-cs-fixer-config/cgl.yaml?label=cgl&logo=github)](https://github.com/CPS-IT/php-cs-fixer-config/actions/workflows/cgl.yaml)
[![Tests](https://img.shields.io/github/actions/workflow/status/CPS-IT/php-cs-fixer-config/tests.yaml?label=tests&logo=github)](https://github.com/CPS-IT/php-cs-fixer-config/actions/workflows/tests.yaml)
[![Supported PHP Versions](https://img.shields.io/packagist/dependency-v/cpsit/php-cs-fixer-config/php?logo=php)](https://packagist.org/packages/cpsit/php-cs-fixer-config)

</div>

This package contains basic [PHP-CS-Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
configuration for use in CPS projects. All configuration options are shipped as rulesets
targeting different use cases.

## 🔥 Installation

[![Packagist](https://img.shields.io/packagist/v/cpsit/php-cs-fixer-config?label=version&logo=packagist)](https://packagist.org/packages/cpsit/php-cs-fixer-config)
[![Packagist Downloads](https://img.shields.io/packagist/dt/cpsit/php-cs-fixer-config?color=brightgreen)](https://packagist.org/packages/cpsit/php-cs-fixer-config)

```bash
composer require --dev cpsit/php-cs-fixer-config
```

## ⚡ Usage

Configure PHP-CS-Fixer in your `.php-cs-fixer.php` file:

```php
use CPSIT\PhpCsFixerConfig;
use PhpCsFixer\Config;

// Create config object and configure Finder
$config = new Config();
$config->getFinder()->in(__DIR__);

// Apply ruleset
$ruleset = new PhpCsFixerConfig\Rule\DefaultRuleset();
$ruleset->apply($config);

return $config;
```

## 🧑‍💻 Contributing

Please have a look at [`CONTRIBUTING.md`](CONTRIBUTING.md).

## ⭐ License

This project is licensed under [GNU General Public License 3.0 (or later)](LICENSE).
