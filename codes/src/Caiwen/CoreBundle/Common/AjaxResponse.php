<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-27
 * Time: 上午10:03
 */

namespace Caiwen\CoreBundle\Common;


class AjaxResponse {
    const ERR_SUCCESS = 0;
    const ERR_NOT_MAN = 1;
    const ERR_FAILED = 2;
    const ERR_PARAM_ILLEGAL = 3;

    private static $errors = array(
        0 => '成功',
        1 => '需验证',
        2 => '失败',
        3 => '参数非法',
    );

    public static function setErrorNo($error_no) {
        self::$ERROR_NO = $error_no;
    }

    public static function encode($error_id = null, $data = null) {
        if (!$error_id) $error_id = self::ERR_SUCCESS;
        $error_msg = self::$errors[$error_id];
        if ($error_msg == null) $error_msg = 'Error!';
        $data = array(
            'errorId' => $error_id,
            'errorMsg' => $error_msg,
            'data' => $data
        );

        return json_encode($data);
    }
} 