<?php
/**
 * Created by PhpStorm.
 * User: yijin
 * Email: <uyijin@gmail.com>
 * Date: 2019/3/23 20:20
 */

namespace joinpay;


use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class JoinPayClient
{
    const PAY_URL = 'https://www.joinpay.com/';
    const UPLOAD_URL = 'https://upload.joinpay.com/';

    /**
     * @param $uri
     * @param $data
     * @return string
     * @throws Exception
     */
    public function exec($uri, $data) : string
    {
        $client = new Client(['base_uri'=>self::PAY_URL, 'verify' => false]);
        try {
            $res = $client->request('POST', $uri, [
                'form_params' => $data,
            ]);
            if ($res->getStatusCode() == 200) {
                return $res->getBody()->getContents();
            } else {
                throw new Exception('server response error http code '.$res->getStatusCode(), -1);
            }
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage(), -2);
        }
    }

    /**
     * @param Request $request
     * @param bool $isPay
     * @return string
     * @throws GuzzleException
     * @throws Exception
     */
    public function execByJson(Request $request, bool $isPay = false) : string
    {
        $client = new Client(['base_uri'=>$isPay ? self::PAY_URL : self::UPLOAD_URL, 'verify' => false]);
        $data = $request->getData();
        $res = $client->request('POST', $request->getUri(), [
            'json' => $data,
        ]);
        if ($res->getStatusCode() == 200) {
            return $res->getBody()->getContents();
        } else {
            throw new Exception('server response error http code '.$res->getStatusCode(), -1);
        }
    }
}
