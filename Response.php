<?php
namespace joinpay;

class Response
{
    protected $result;
    protected $msg;
    protected $data;

    public function success($data, $msg = '') {
        $this->result = false;
        $this->msg = $msg;
        $this->data = $data;
        return $this;
    }

    public function fail($msg) {
        $this->result = false;
        $this->msg = $msg;
        return $this;
    }
}
