> 提供yaml文件统一管理laravel语言包，兼容laravel的validation翻译。 

## 安装
```bash
composer require maplesnow/laravel-yaml-translation
```

## 添加laravel支持  
将 **app/config/app.php** 中 `Illuminate\Translation\TranslationServiceProvider` 替换成 `MapleSnow\Yaml\Providers\TranslationServiceProvider`

## 发布yml文件到项目中:

```
php artisan vendor:publish --provider="MapleSnow\Yaml\Providers\TranslationServiceProvider"
```

## 用法示例
### 基础翻译
lang.yml自定义翻译,*统一使用snake命名*
```yaml
# 自定义属性
attribute:
  user:
    table_name: '用户'
    name: '用户名称'
    nickname: '昵称'
    
  role:
    table_name: '角色'
    name: '角色名称'  

# 自定义消息
message:
  hello: "你好,:name"
  user:
    delete_has_logs: "用户下存在日志，无法删除，请先删除用户"
```

兼容laravel原生`trans`方法
```php
trans("lang.message.hello",['name','laravel-yaml']);
# 结果: 你好,laravel-yaml
```

接口操作返回
1. 参数不需要翻译，外部传入
```php
Lang::createFailed("用户");
# 结果: 创建用户失败
Lang::createFailed(Lang::attribute("user.table_name"));
# 结果: 创建用户失败
```    

2. 参数内部翻译
```php
Lang::updateSuccess("user.table_name",true);
# 结果: 编辑用户成功
```   

3. 批量操作
```php
Lang::deleteSuccess("user.table_name",true,true);
# 结果: 批量删除用户成功
Lang::deleteSuccess("user.table_name",true);
# 结果: 删除用户成功
```  

接口结果返回
```php
Lang::paramError("用户名称");
# 结果: 用户名称参数缺失

Lang::paramError("user.nickname",true);
# 结果: 昵称参数缺失

Lang::resourceMiss("user.tableName",true);
# 结果: 用户资源不存在

Lang::unauthorized();
# 结果: 未登录
```

自定义翻译
```php
Lang::message("user.delete_has_logs")
# 结果: 用户下存在日志，无法删除，请先删除用户
```

## Validation翻译
将`request`文件继承`MapleSnow\Yaml\Request\BaseRequest.php`

如果需要翻译指定模块的属性
```yaml
# 添加自定义属性
attribute:
  module:
    name: '模块名称'
```

在`Request`文件的`rules`方法中指定模块
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

## License
laravel-yaml-translation is free software distributed under the terms of the [MIT license](https://opensource.org/licenses/MIT).
