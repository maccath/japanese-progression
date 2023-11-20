# 🇯🇵 Japanese Progression

A simple PHP application that displays Japanese language learning progress.

[![GitHub Workflow](https://img.shields.io/github/actions/workflow/status/maccath/japanese-progression/php.yml?style=for-the-badge&logo=github&logoColor=white)](https://github.com/maccath/japanese-progression/actions)
[![PHP](https://img.shields.io/badge/PHP_^8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)](https://getcomposer.org)

## Requirements
- [PHP ^8.2](https://www.php.net/releases/8.2/)
- [Composer](https://getcomposer.org)

## Installation

```shell
composer install
```

## Usage

To run the application locally, use the PHP built-in development server.

```shell
php -S localhost:8000
```

The application will be available at [http://localhost:8000](http://localhost:8000/)

<div style="text-align: center;">
    <img src="docs/screenshot.png" alt="demo screenshot" />
</div>

## Unit Tests

Tests are written using PHPUnit and stored under app/tests.

```shell
./vendor/bin/phpunit app/tests
```
