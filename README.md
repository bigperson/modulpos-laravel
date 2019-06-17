# PHP клиент для API автоматической фискализации чеков интернет-магазинов Модуль.Кассы
[![](https://img.shields.io/packagist/l/bigperson/modulpos-laravel.svg?style=flat-square)](https://github.com/bigperson/modulpos-laravel/blob/master/LICENSE) 
[![](https://img.shields.io/packagist/dt/bigperson/modulpos-laravel.svg?style=flat-square)](https://packagist.org/packages/bigperson/modulpos-laravel)
[![](https://img.shields.io/packagist/v/bigperson/modulpos-laravel.svg?style=flat-square)](https://packagist.org/packages/bigperson/modulpos-laravel)
[![](https://img.shields.io/travis/bigperson/modulpos-laravel.svg?style=flat-square)](https://travis-ci.org/bigperson/modulpos-laravel)
[![](https://img.shields.io/codecov/c/github/bigperson/modulpos-laravel.svg?style=flat-square)](https://codecov.io/gh/bigperson/modulpos-laravel)
[![StyleCI](https://styleci.io/repos/98306851/shield?branch=master)](https://styleci.io/repos/98306851)

Пакет предоставляет из себя сервис провайдер для Laravel для упращения работы с пакетом [bigperson/modulpos-php-api-client](https://github.com/bigperson/modulpos-php-api-client)

## Требования
* php ^7.1
* laravel ^5.6 (более старые версии не тестировались)
* guzzlehttp/guzzle (или любой клиент следующий интерфейсу `\GuzzleHttp\ClientInterface`)
* ext-json

## Установка
Вы можете установить данный пакет с помощью сomposer:

```
composer require bigperson/modulpos-laravel
```

## Использование

### Создания связки аккаунта и розничной точки
Для упрощения работы пакет включает в себя консольную команду для ассоциации точки продаж с вашим сайтом:

```
php artisan modulpos:associate
```
### Сохраннение настроек
Далее добавьте в свой .env файл переменные полученные от консольной комманды
```
MODULPOS_LOGIN= //Логин полученные после ассоциаци
MODULPOS_PASSWORD= //Пароль полученные после ассоциаци
MODULPOS_TEST_MODE=1 //Использовать тестовый режим
```
### Использование в контроллерах
Далее вы можете вызывать объект клиента через [сервис-контейнер laravel](https://laravel.com/docs/5.8/container)

```php
use Bigperson\ModulposApiClient\Client;
public function __construct(Client $client)
{
    $this->client = $client;
}
```

## Развитие пакета
С целью активного развития пакета, рекомендуем создавать пулл-реквесты, а не только баг-репорты ([issues](https://github.com/bigperson/modulpos-laravel/issues)). 
По любым проблемам рекомендуем открывать Баг-репорты с подробным описанием проблемы и последовательностью действия для воспроизведения бага.

## Лицензия
[MIT](https://raw.githubusercontent.com/bigperson/modulpos-laravel/master/LICENSE)
