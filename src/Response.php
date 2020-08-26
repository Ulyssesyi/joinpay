<?php
namespace joinpay;

class Response
{
    private $result;
    private $msg;
    private $data;

    public function success($data) {
        $this->result = true;
        $this->data = $data;
        return $this;
    }

    public function fail($msg) {
        $this->result = false;
        $this->msg = $msg;
        return $this;
    }

    public function isSuccess() {
        return $this->result;
    }

    public function getErrorMsg() {
        return $this->msg;
    }

    public function getData() {
        return $this->data;
    }
}
