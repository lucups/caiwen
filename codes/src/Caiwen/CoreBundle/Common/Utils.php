<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-29
 * Time: 下午8:12
 */

namespace Caiwen\CoreBundle\Common;


/**
 * Class Utils
 *
 * 工具类
 *
 * @package Caiwen\CoreBundle\Common
 */
class Utils {

    /**
     * 生成指定长度的随机码
     * @param int $n 需要的随机码长度
     * @return string
     */
    public static function getRandomCode($n = 32) {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $n);
    }

    /**
     * 邮箱合法性判断
     * @param $email
     * @return boolean
     */
    public static function checkEmailValidity($email) {
        $pattern = "/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
        return preg_match($pattern, $email);
    }

    /**
     * 根据邮箱获取邮箱网站
     * @param $email
     * @return string
     */
    public static function getEmailWebSite($email) {
        $url = 'mail.';
        if (self::checkEmailValidity($email)) {
            $x = strpos($email, '@');
            $url .= mb_substr($email, $x + 1);
        }
        return $url;
    }

    /**
     * sha512 加密字符串
     * @param $str
     * @return string
     */
    public static function sha512($str) {
        return openssl_digest($str, 'sha512');
    }

    /**
     * Return the string of time.
     * @return bool|string
     */
    public static function timeStr() {
        return date('YmdHis');
    }

    /**
     * Rename File 文件重命名
     * 以当前时间和随机码组成
     * @param $name
     * @param int $length
     * @return string
     */
    public static function rename($name, $length = 6) {
        $newName = self::timeStr() . '-' . self::getRandomCode($length);
        // strrchr 查找指定字符在字符串中的最后一次出现,
        // 该函数返回 haystack 字符串中的一部分，这部分以 needle 的最后出现位置开始，直到 haystack 末尾。
        $tmp = strrchr($name, '.');
        if ($tmp != false) {
            $newName .= $tmp;
        }
        return $newName;
    }

    /**
     * Get RGB Color Set
     * @param int $num
     * @return array
     */
    public static function getRgbColorSet($num = 10) {

        $colors = array(
            0 => '#FF0000',
            1 => '#33FF00',
            2 => '#0000FF',
            3 => '#FFFF33',
            4 => '#006633',
            5 => '#FF00CC',
            6 => '#660099',
            7 => '#333399',
            8 => '#660000',
            9 => '#00CC00',
        );

        if($num <= 10) {
            return array_slice($colors,0,$num);
        }

        $colors = array();
        for ($i = 0; $i < $num; $i++) {
            $colors[$i] = self::getOneColor();
        }
        return $colors;
    }

    /**
     * Get RGBA Color Set
     * @param int $num
     * @return array
     */
    public static  function getRgbaColorSet($num = 10){
        // code ...
        return array();
    }

    /**
     * Get One Kind of Color
     * @return string
     */
    public static function getOneColor() {
        $r = self::decToHex();
        $g = self::decToHex();
        $b = self::decToHex();
        return '#' . $r . $g . $b;
    }

    /**
     * 10->16
     * @return mixed
     */
    private static function decToHex() {
        $dec = rand(0, 255);
        $hexStr = '0123456789ABCDEF';
        $low = abs($dec % 16);
        $high = abs(($dec - $low) / 16);
        $hex = (strlen($hexStr) > $high ? $hexStr[$high] : $hexStr[0]) +
            (strlen($hexStr) > $low ? $hexStr[$low] : $hexStr[10]);
        return $hex;
    }

}