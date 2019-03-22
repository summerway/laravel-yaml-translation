<?php
/**
 * Created by PhpStorm.
 * User: seraph
 * Date: 2019-03-17
 * Time: 13:41
 */

namespace MapleSnow\Yaml\Requests;

use Illuminate\Foundation\Http\FormRequest;
use MapleSnow\Yaml\Helper\LangHelper;

class BaseRequest extends FormRequest
{

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
        $data = LangHelper::getValidateAttribute();
        return is_array($data) ? $data : array();
    }


    /**
     * 修改validation的validate的message
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function messages(){
        $data =  LangHelper::getValidateInfo();
        return is_array($data) ? $data : array();
    }

}
