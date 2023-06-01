# Cast datetime with timezone for Laravel

Laravel doesn't respect timezone. 

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

Cast `\Codewiser\Casts\AsDatetimeWithTZ` fixes this wrong behaviour.

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
