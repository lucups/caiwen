<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 14-1-4
 * Time: 上午2:17
 */

namespace Caiwen\CoreBundle\Common;

class CUtils {

    public static function setParameters($obj, $request, $arr) {

        foreach ($arr as $a) {
            $name = CUtils::toCapitalizeCamelCase($a);
            eval("\$obj->set{$name}(\$request->get('{$a}'));");
        }
        return $obj;
    }

    /**
     * Change String To Camel Case
     * example: hello_world => helloWorld
     * @param $str
     * @return mixed
     */
    public static function toCamelCase($str) {

        return $str;
    }

    /**
     * Change String To Capitalize Camel Case
     * example: hello_world => HelloWorld
     * @param $str
     * @return mixed
     */
    public static function toCapitalizeCamelCase($str) {
        $arr = explode('_', $str);
        $str = '';
        foreach ($arr as $a) {
            $str .= ucfirst($a);
        }
        return $str;
    }

    /**
     * Change String To Under Score Case
     * example: helloWorld => HelloWorld
     * @param $str
     * @return mixed
     */
    public static function toUnderScoreCase($str) {
        return $str;
    }

} 