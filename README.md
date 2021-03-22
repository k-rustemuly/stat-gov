# stat-gov
Библиотека для парсинга данные из stat.gov.kz Получение данных по юридическому лицу или индивидуальному предпринимателю по БИН или ИИН


## Установка

Установка производится через *composer*. Для установки наберите команду в директории вашего php проекта:


```bash
composer require k-rustemuly/stat-gov
```

## Использование


```php
$api = new \Stat\Gov\Api();
```


### Поиск по БИН или ИИН

```php
try{
  $info = $api->search("012345678912", "ru");
  var_dump($info);
}catch(\Stat\Gov\ApiErrorException $e){
  echo $e->getMessage();
}catch(\Stat\Gov\CurlException $e){
  echo $e->getMessage();
}
```


## Авторы

- **Osmanov Kuanysh** - Initial work

## Лицензия

Проект лицензирован под лицензией [MIT](LICENSE)
