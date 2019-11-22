<?php
/**
 * Created by PhpStorm.
 * User: MapleSnow
 * Date: 2019/4/30
 * Time: 4:13 PM
 */

namespace MapleSnow\Yaml\Helpers;

class Lang {

    /**
     * 参数错误
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function paramError($attr = "",$needTransAttr = false){
        $needTransAttr && $attr = self::attribute($attr);
        return trans("lang.result.param_error",['attribute' => $attr]);
    }

    /**
     * 参数缺失
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function paramMiss($attr = "",$needTransAttr = false){
        $needTransAttr && $attr = self::attribute($attr);
        return trans("lang.result.param_miss",['attribute' => $attr]);
    }

    /**
     * 资源不存在
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function resourceMiss($attr = "",$needTransAttr = false){
        $needTransAttr && $attr = self::attribute($attr);
        return trans("lang.result.resource_miss",['attribute' => $attr]);
    }

    /**
     * 操作错误
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public static function operatingException() {
        return trans("lang.result.operating_exception");
    }
    
    /**
     * 未登录
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public static function unauthorized() {
        return trans("lang.result.unauthorized");
    }

    /**
     * 无权操作
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public static function forbidden() {
        return trans("lang.result.forbidden");
    }

    /**
     * 请求错误
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public static function badRequest() {
        return trans("lang.result.bad_request");
    }
    
    /**
     * 不支持该操作
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public static function notAcceptable() {
        return trans("lang.result.not_acceptable");
    }
    
    /**
     * 数据未发生修改
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public static function nothingChanged() {
        return trans("lang.result.nothing_changed");
    }

    /**
     * 系统错误
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public static function systemError() {
        return trans("lang.result.system_error");
    }

    /**
     * 属性翻译
     * @param $param
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function attribute($param){
        return trans("lang.attribute.{$param}");
    }

    /**
     * 消息翻译
     * @param $param
     * @param array $replace
     * @return mixed
     */
    static public function message($param, $replace = []){
        return trans("lang.message.{$param}", $replace);
    }

    /*************************** 操作 ***************************/

    /**
     * 操作成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function defaultSuccess($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_DEFAULT,$attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 操作失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function defaultFailed($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_DEFAULT,$attr,LangHelper::RS_FAILED);
    }

    /**
     * 创建成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function createSuccess($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_CREATE,$attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 创建失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function createFailed($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_CREATE,$attr,LangHelper::RS_FAILED);
    }

    /**
     * 编辑成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function updateSuccess($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_UPDATE,$attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 编辑失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function updateFailed($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_UPDATE,$attr,LangHelper::RS_FAILED);
    }

    /**
     * 删除成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function deleteSuccess($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_DELETE : LangHelper::OP_DELETE, $attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 删除失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function deleteFailed($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_DELETE : LangHelper::OP_DELETE,$attr,LangHelper::RS_FAILED);
    }

    /**
     * 上线成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function onlineSuccess($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_ONLINE : LangHelper::OP_ONLINE,$attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 上线失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function onlineFailed($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_ONLINE : LangHelper::OP_ONLINE,$attr,LangHelper::RS_FAILED);
    }

    /**
     * 下线成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function offlineSuccess($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_OFFLINE : LangHelper::OP_OFFLINE,$attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 下线失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function offlineFailed($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_OFFLINE : LangHelper::OP_OFFLINE,$attr,LangHelper::RS_FAILED);
    }

    /**
     * 启用成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function enableSuccess($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_ENABLE : LangHelper::OP_ENABLE,$attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 启用失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function enableFailed($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_ENABLE : LangHelper::OP_ENABLE,$attr,LangHelper::RS_FAILED);
    }

    /**
     * 禁用成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function disableSuccess($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_DISABLE : LangHelper::OP_DISABLE,$attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 禁用失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function disableFailed($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_DISABLE : LangHelper::OP_DISABLE,$attr,LangHelper::RS_FAILED);
    }

    /**
     * 发布成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function publishSuccess($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_PUBLISH,$attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 发布失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function publishFailed($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_PUBLISH,$attr,LangHelper::RS_FAILED);
    }

    /**
     * 导入成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function importSuccess($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_IMPORT,$attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 导入失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function importFailed($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_IMPORT,$attr,LangHelper::RS_FAILED);
    }

    /**
     * 导出成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function exportSuccess($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_EXPORT,$attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 导出失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function exportFailed($attr = "",$needTransAttr = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate(LangHelper::OP_EXPORT,$attr,LangHelper::RS_FAILED);
    }

    /**
     * 回收成功
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function recoverSuccess($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_RECOVER : LangHelper::OP_RECOVER,$attr,LangHelper::RS_SUCCESS);
    }

    /**
     * 回收失败
     * @param string $attr 属性
     * @param bool $needTransAttr 是否需要翻译属性
     * @param bool $isMulti 是否批量
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    static public function recoverFailed($attr = "",$needTransAttr = false,$isMulti = false) {
        $needTransAttr && $attr = self::attribute($attr);
        return LangHelper::operate($isMulti ? LangHelper::OP_BATCH_RECOVER : LangHelper::OP_RECOVER,$attr,LangHelper::RS_FAILED);
    }
}