<?php
/**
 * Created by PhpStorm.
 * User: MapleSnow
 * Date: 2019/5/17
 * Time: 11:05 AM
 */

namespace MapleSnow\Yaml\Helpers;

class LangHelper {
    const
        OP_DEFAULT = 'default',
        OP_CREATE = 'create',
        OP_UPDATE = 'update',
        OP_DELETE = 'delete',
        OP_ONLINE = 'online',
        OP_OFFLINE = 'offline',
        OP_ENABLE = 'enable',
        OP_DISABLE = 'disable',
        OP_PUBLISH = 'publish',
        OP_IMPORT = 'import',
        OP_EXPORT = 'export',
        OP_RECOVER = 'recover',
        OP_APPROVE="approve",
        OP_REFUSE="refuse",

        OP_BATCH_DELETE = 'batch_delete',
        OP_BATCH_ONLINE = 'batch_online',
        OP_BATCH_OFFLINE = 'batch_offline',
        OP_BATCH_ENABLE = 'batch_enable',
        OP_BATCH_DISABLE = 'batch_disable',
        OP_BATCH_RECOVER = 'batch_recover',
        OP_BATCH_APPROVE="batch_approve",
        OP_BATCH_REFUSE="batch_refuse"
    ;

    const
        RS_SUCCESS = 'success',
        RS_FAILED = 'failed'
    ;

    public static function operate($action,$attribute,$result) {
        return trans("lang.operate.{$action}_{$result}",['attribute' => $attribute]);
    }
}