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

class UniPay implements Request
{
    private $p0_Version = '1.0';
    private $p1_MerchantNo = '';
    private $p2_OrderNo = '';
    private $p3_Amount = 0.00;
    private $p4_Cur = '1';
    private $p5_ProductName = '';
    private $p6_ProductDesc = '';
    private $p7_Mp = '';
    private $p8_ReturnUrl = '';
    private $p9_NotifyUrl = '';
    private $q1_FrpCode = '';
    private $q2_MerchantBankCode = '';
    private $q4_IsShowPic = '';
    private $q5_OpenId = '';
    private $q6_AuthCode = '';
    private $q7_AppId = '';
    private $q8_TerminalNo = '';
    private $q9_TransactionModel = '';
    private $qa_TradeMerchantNo = '';
    private $qb_buyerId = '';
    private $qc_IsAlt = '';
    private $qd_AltType = '';
    private $qe_AltInfo = '';
    private $qf_AltUrl = '';
    private $qg_MarketingAmount = 0.00;

    /**
     * @param string $p1_MerchantNo
     * @return UniPay
     */
    public function setP1MerchantNo(string $p1_MerchantNo): UniPay
    {
        $this->p1_MerchantNo = $p1_MerchantNo;
        return $this;
    }

    /**
     * @param string $p2_OrderNo
     * @return UniPay
     */
    public function setP2OrderNo(string $p2_OrderNo): UniPay
    {
        $this->p2_OrderNo = $p2_OrderNo;
        return $this;
    }

    /**
     * @param float $p3_Amount
     */
    public function setP3Amount(float $p3_Amount): UniPay
    {
        $this->p3_Amount = round($p3_Amount, 2);
        return $this;
    }

    /**
     * @param string $p5_ProductName
     * @return UniPay
     */
    public function setP5ProductName(string $p5_ProductName): UniPay
    {
        $this->p5_ProductName = $p5_ProductName;
        return $this;
    }

    /**
     * @param string $p6_ProductDesc
     * @return UniPay
     */
    public function setP6ProductDesc(string $p6_ProductDesc): UniPay
    {
        $this->p6_ProductDesc = $p6_ProductDesc;
        return $this;
    }

    /**
     * @param string $p7_Mp
     * @return UniPay
     */
    public function setP7Mp(string $p7_Mp): UniPay
    {
        $this->p7_Mp = $p7_Mp;
        return $this;
    }

    /**
     * @param string $p8_ReturnUrl
     * @return UniPay
     */
    public function setP8ReturnUrl(string $p8_ReturnUrl): UniPay
    {
        $this->p8_ReturnUrl = $p8_ReturnUrl;
        return $this;
    }

    /**
     * @param string $p9_NotifyUrl
     * @return UniPay
     */
    public function setP9NotifyUrl(string $p9_NotifyUrl): UniPay
    {
        $this->p9_NotifyUrl = $p9_NotifyUrl;
        return $this;
    }

    /**
     * @param string $q1_FrpCode
     * @return UniPay
     */
    public function setQ1FrpCode(string $q1_FrpCode): UniPay
    {
        $this->q1_FrpCode = $q1_FrpCode;
        return $this;
    }

    /**
     * @param string $q2_MerchantBankCode
     * @return UniPay
     */
    public function setQ2MerchantBankCode(string $q2_MerchantBankCode): UniPay
    {
        $this->q2_MerchantBankCode = $q2_MerchantBankCode;
        return $this;
    }

    /**
     * @param string $q4_IsShowPic
     * @return UniPay
     */
    public function setQ4IsShowPic(string $q4_IsShowPic): UniPay
    {
        $this->q4_IsShowPic = $q4_IsShowPic;
        return $this;
    }

    /**
     * @param string $q5_OpenId
     * @return UniPay
     */
    public function setQ5OpenId(string $q5_OpenId): UniPay
    {
        $this->q5_OpenId = $q5_OpenId;
        return $this;
    }

    /**
     * @param string $q6_AuthCode
     * @return UniPay
     */
    public function setQ6AuthCode(string $q6_AuthCode): UniPay
    {
        $this->q6_AuthCode = $q6_AuthCode;
        return $this;
    }

    /**
     * @param string $q7_AppId
     * @return UniPay
     */
    public function setQ7AppId(string $q7_AppId): UniPay
    {
        $this->q7_AppId = $q7_AppId;
        return $this;
    }

    /**
     * @param string $q8_TerminalNo
     * @return UniPay
     */
    public function setQ8TerminalNo(string $q8_TerminalNo): UniPay
    {
        $this->q8_TerminalNo = $q8_TerminalNo;
        return $this;
    }

    /**
     * @param string $q9_TransactionModel
     * @return UniPay
     */
    public function setQ9TransactionModel(string $q9_TransactionModel): UniPay
    {
        $this->q9_TransactionModel = $q9_TransactionModel;
        return $this;
    }

    /**
     * @param string $qa_TradeMerchantNo
     * @return UniPay
     */
    public function setQaTradeMerchantNo(string $qa_TradeMerchantNo): UniPay
    {
        $this->qa_TradeMerchantNo = $qa_TradeMerchantNo;
        return $this;
    }

    /**
     * @param string $qb_buyerId
     * @return UniPay
     */
    public function setQbBuyerId(string $qb_buyerId): UniPay
    {
        $this->qb_buyerId = $qb_buyerId;
        return $this;
    }

    /**
     * @param string $qc_IsAlt
     * @return UniPay
     */
    public function setQcIsAlt(string $qc_IsAlt): UniPay
    {
        $this->qc_IsAlt = $qc_IsAlt;
        return $this;
    }

    /**
     * @param string $qd_AltType
     * @return UniPay
     */
    public function setQdAltType(string $qd_AltType): UniPay
    {
        $this->qd_AltType = $qd_AltType;
        return $this;
    }

    /**
     * @param string $qe_AltInfo
     * @return UniPay
     */
    public function setQeAltInfo(string $qe_AltInfo): UniPay
    {
        $this->qe_AltInfo = $qe_AltInfo;
        return $this;
    }

    /**
     * @param string $qf_AltUrl
     * @return UniPay
     */
    public function setQfAltUrl(string $qf_AltUrl): UniPay
    {
        $this->qf_AltUrl = $qf_AltUrl;
        return $this;
    }

    /**
     * @param float $qg_MarketingAmount
     * @return UniPay
     */
    public function setQgMarketingAmount(float $qg_MarketingAmount): UniPay
    {
        $this->qg_MarketingAmount = $qg_MarketingAmount;
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
        return 'trade/uniPayApi.action';
    }

    public function getData() : array
    {
        $vars = get_object_vars($this);
        $data = array_filter($vars);
        $sign = SignData::getInstance();
        $data['hmac'] = $sign->sign($data);
        return $data;
    }

    public function format(array $response) : Response {
        $sign = SignData::getInstance();
        if (!$sign->checkSign($response, 'hmac')) {
            return (new Response())->fail('验签失败');
        }
        if (isset($response['ra_Code']) && (int)$response['ra_Code'] === 100) {
            return (new Response())->success([
                'payInfo' => isset($response['rd_Pic']) && $response['rd_Pic'] ? $response['rd_Pic'] : $response['rc_Result'],
                'orderNo' => $response['r2_OrderNo']
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
