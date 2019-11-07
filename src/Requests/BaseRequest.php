<?php
/**
 * Created by PhpStorm.
 * User: seraph
 * Date: 2019-03-17
 * Time: 13:41
 */

namespace MapleSnow\Yaml\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class BaseRequest extends FormRequest
{

    private $prefix;    // 语言包前缀
    private $module;    // 模块名

    public function getPrefix(){
        is_null($this->prefix) && $this->prefix = Config::get("app.lang_prefix","lang");
        return $this->prefix;
    }

    public function setModule($module){
        $this->module = $module;
    }

    public function getModule() {
        return $this->module;
    }

    /**
     * 调整input
     * @param null $key
     * @param null $default
     * @return array|mixed|string|null
     */
    public function input($key = null, $default = null)
    {
        return data_get(
                $this->getInputSource()->all() + $this->query->all(), $key, $default
            ) ?? $default;
    }

    /**
     * 修改validation的attribute
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function attributes() {
        $module = $this->getModule();
        if($module){
            $data = trans("{$this->getPrefix()}.attribute.{$module}");
            // 兼容入参camel

            $data = $this->appendCamel($data);
        }else{
            $data = trans("{$this->getPrefix()}.validation.attribute");
        }

        return is_array($data) ? $data : array();
    }

    /**
     * 修改validation的validate的message
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function messages(){
        $data =  trans("{$this->getPrefix()}.validation.validate");

        return is_array($data) ? $data : array();
    }

    private function appendCamel($arr) {
        foreach ($arr as $key => $value){
            $keyCamel = Str::camel($key);
            if($keyCamel != $key){
                $arr[$keyCamel] = $value;
            }
        }

        return $arr;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize()
    {
        return true;
    }*/
}
