# Cast datetime with timezone for Laravel

[![PHP Composer](https://github.com/C0deWiser/laravel-cast-datetime-tz/actions/workflows/php.yml/badge.svg)](https://github.com/C0deWiser/laravel-cast-datetime-tz/actions/workflows/php.yml)

Laravel doesn't respect timezone. Cast `\Codewiser\Casts\AsDatetimeWithTZ` fixes this wrong behaviour.

## Before

```php
class Article extends \Illuminate\Database\Eloquent\Model
{
    protected $casts = [
        'date' => 'datetime'
    ];
}
```

```php
// e.g. Laravel has Europe/London (+01:00) timezone
config()->set('app.timezone', 'Europe/London');

$model = new Article();

$model->date = '2000-01-01T10:00:00+02:00';

echo $model->date->format('c');
// Expecting 2000-01-01T09:00:00+01:00
// Actual    2000-01-01T10:00:00+01:00
```

## After

```php
class Article extends \Illuminate\Database\Eloquent\Model
{
    protected $casts = [
        'date' => \Codewiser\Casts\AsDatetimeWithTZ::class
    ];
}
```

```php
// e.g. Laravel has Europe/London (+01:00) timezone
config()->set('app.timezone', 'Europe/London');

$model = new Article();

$model->date = '2000-01-01T10:00:00+02:00';

echo $model->date->format('c');
// Expecting 2000-01-01T09:00:00+01:00
// Actual    2000-01-01T09:00:00+01:00
```
