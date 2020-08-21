<?php
/**
 * Created by PhpStorm.
 * User: yijin
 * Email: <uyijin@gmail.com>
 * Date: 2019/3/23 20:20
 */

namespace joinpay;


interface Request
{
    /**
     * @param $key
     * @return Request
     */
    public function setKey($key) : Request;

    public function getUri() : string;

    public function getData() : array;

    public function format(array $response) : Response;

    public function exec() : Response;
}
