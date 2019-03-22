> 提供yaml文件统一管理laravel语言包，兼容laravel的validation翻译。 

## 安装
```bash
composer require maplesnow/laravel-yaml-translation
```

## 添加laravel支持  
将 **app/config/app.php** 中 `Illuminate\Translation\TranslationServiceProvider` 替换成 `MapleSnow\Yaml\TranslationServiceProvider`

## Validation
将`request`文件继承`MapleSnow\Yaml\Request\BaseRequest.php`


## 用法示例
```php
dump(trans("lang.message.hello",['name','laravel-yaml']));
```

## License
laravel-yaml-translation is free software distributed under the terms of the [MIT license](https://opensource.org/licenses/MIT).
