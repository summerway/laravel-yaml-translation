<?php
/**
 * Created by PhpStorm.
 * User: seraph
 * Date: 2019-03-20
 * Time: 14:37
 */

namespace MapleSnow\Yaml\Helper;

class LangHelper
{

    /**
     * validation的attribute信息
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function getValidateAttribute(){
        $prefix = Config::get("app.lang_prefix","lang");
        return trans($prefix.".validation.attribute");
    }

    /**
     * validation的验证信息
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function getValidateInfo(){
        $prefix = Config::get("app.lang_prefix","lang");
        return trans($prefix.".validation.validate");
    }
}
