> 提供yaml文件统一管理laravel语言包，兼容laravel的validation翻译。 

## 安装
```bash
composer require maplesnow/laravel-yaml-translation
```

## 添加laravel支持  
将 **app/config/app.php** 中 `Illuminate\Translation\TranslationServiceProvider` 替换成 `MapleSnow\Yaml\TranslationServiceProvider`

## 发布yml文件到项目中:

```
php artisan vendor:publish --provider="MapleSnow\Yaml\TranslationServiceProvider"
```
    
## Validation
将`request`文件继承`MapleSnow\Yaml\Request\BaseRequest.php`

如果需要翻译指定模块的属性
```yaml
# 添加自定义属性
attribute:
  module:
    name: '模块名称'
```

在`Request`文件中`rules`指定模块
```php
class ModuleRequest extends BaseRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        # 指定模块
        $this->setModule("module");
        return [
            'name' => 'required'
        ];
    }
}
```



## 用法示例
```php
dump(trans("lang.message.hello",['name','laravel-yaml']));
```

## License
laravel-yaml-translation is free software distributed under the terms of the [MIT license](https://opensource.org/licenses/MIT).
