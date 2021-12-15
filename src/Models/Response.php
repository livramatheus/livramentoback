<?php

namespace Livramatheus\Livramentoback\Models;

class Response {

    private $data;
    private $responseCode;

    public function __construct() {
        $this->setResponseCode(200);
    }

    public function getData() {
        return $this->data;
    }

    public function getResponseCode() : int {
        return $this->responseCode;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setResponseCode(int $responseCode) {
        $this->responseCode = $responseCode;
    }

    public function getDataJson() : string {
        return json_encode(['data' => $this->data]);
    }
}
