<?php
/**
 * Created by PhpStorm.
 * User: yijin
 * Email: <uyijin@gmail.com>
 * Date: 2019/3/23 20:20
 */

namespace joinpay\request;

use joinpay\JoinPayClient;
use joinpay\Request;
use joinpay\Response;
use joinpay\SignData;

class QueryOrder implements Request
{

    private $p1_MerchantNo = '';
    private $p2_OrderNo = '';

    /**
     * @param string $p1_MerchantNo
     * @return QueryOrder
     */
    public function setP1MerchantNo(string $p1_MerchantNo): QueryOrder
    {
        $this->p1_MerchantNo = $p1_MerchantNo;
        return $this;
    }

    /**
     * @param string $p2_OrderNo
     * @return QueryOrder
     */
    public function setP2OrderNo(string $p2_OrderNo): QueryOrder
    {
        $this->p2_OrderNo = $p2_OrderNo;
        return $this;
    }

    /**
     * @param string $key
     * @return UniPay
     */
    public function setKey($key): Request
    {
        $sign = SignData::getInstance();
        $sign->setKey($key);
        return $this;
    }

    public function getUri(): string
    {
        return 'trade/queryOrder.action';
    }

    public function getData() : array
    {
        $vars = get_object_vars($this);
        $data = array_filter($vars);
        $data['hmac'] = SignData::sign($data);
        return $data;
    }

    public function format(array $response) : Response {
        $sign = SignData::getInstance();
        if (!$sign->checkSign($response, 'hmac')) {
            return (new Response())->fail('验签失败');
        }
        if (isset($response['rb_Code']) && (int)$response['rb_Code'] === 100) {
            switch ((int)$response['ra_Status']) {
                case 100:
                    $status = 1;
                    break;
                case 101:
                    $status = -1;
                    break;
                case 102:
                    $status = 0;
                    break;
                case 103:
                    $status = 2;
                    break;
                default:
                    $status = -1;
            }
            return (new Response())->success([
                'status' =>  $status,
                'amount' =>  $response['r3_Amount'],
            ]);
        } else {
            return (new Response())->fail($response['rb_CodeMsg']);
        }
    }

    public function exec(): Response {
        try {
            $res = (new JoinPayClient())->exec($this->getUri(), $this->getData());
            return $this->format(json_decode($res, true));
        } catch (\Exception $e) {
            return (new Response())->fail($e->getMessage());
        }
    }
}
