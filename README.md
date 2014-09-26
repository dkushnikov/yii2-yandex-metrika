yii2-yandex-metrika
===================

Yii2 widget to add Yandex.Metrika counter on page


Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "dkushnikov/yii2-yandex-metrika" "*"
```

or add

```json
"dkushnikov/yii2-yandex-metrika" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----
```php
use yii\widgets\YandexMetrikaCounter;

<?= YandexMetrikaCounter::widget(
    [
        'counterId' => 12345,
    ]
) ?>
```