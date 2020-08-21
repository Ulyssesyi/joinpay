<?php
/**
 * Created by PhpStorm.
 * User: yijin
 * Email: <uyijin@gmail.com>
 * Date: 2019/3/23 20:20
 */

namespace joinpay;

class SignData
{
    /**
     * @var mixed|string
     */
    private $key;
    private static $_instance = null;

    private function __construct()
    {
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new SignData();
        }
        return self::$_instance;
    }

    public function setKey($key) {
        $this->key = $key;
    }

    public function sign(array $data, bool $isPay = true) : string
    {
        $str = '';
        if ($isPay) {
            foreach ($data as $key => $datum) {
                $str .= $datum;
            }
            $str .= $this->key;
        } else {
            foreach ($data as $key => $datum) {
                if ($key == 'aes_key') {
                    continue;
                } elseif ($key == 'data') {
                    $str .= $key .'='. json_encode($datum, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES) . '&';
                } else {
                    $str .= $key .'='. $datum . '&';
                }
            }
            $str .= 'key=' . $this->key;
        }
        return md5($str);
    }

    public function checkSign(array $data, string $signKey, bool $isPay = true) : bool
    {
        $signStr = $data[$signKey];
        unset($data[$signKey]);
        ksort($data);
        $str = '';
        if ($isPay) {
            foreach ($data as $key => $datum) {
                if ($key == 'ra_PayTime' || $key == 'rb_DealTime' || $key == 'r5_Mp') {
                    $str .= urldecode($datum);
                } else {
                    $str .= is_float($datum) ? number_format($datum, 2, '.', '') : (is_string($datum) ? $datum : json_encode($datum, JSON_UNESCAPED_SLASHES));
                }
            }
            $str .= $this->key;
        } else {
            foreach ($data as $key => $datum) {
                if ($key == 'aes_key') {
                    continue;
                } elseif ($key == 'data') {
                    $str .= $key .'='. json_encode($datum, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES) . '&';
                } else {
                    $str .= $key .'='. $datum . '&';
                }
            }
            $str .= 'key=' . $this->key;
        }
        return md5($str) === strtolower($signStr);
    }
}
