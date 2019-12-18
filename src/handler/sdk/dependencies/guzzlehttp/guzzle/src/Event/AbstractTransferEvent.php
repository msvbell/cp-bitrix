<?php
namespace GuzzleHttp\Event; use GuzzleHttp\Message\ResponseInterface; use GuzzleHttp\Ring\Future\FutureInterface; abstract class AbstractTransferEvent extends AbstractRequestEvent { public function getTransferInfo($name = null) { if (!$name) { return $this->transaction->transferInfo; } return isset($this->transaction->transferInfo[$name]) ? $this->transaction->transferInfo[$name] : null; } public function hasResponse() { return !($this->transaction->response instanceof FutureInterface); } public function getResponse() { return $this->hasResponse() ? $this->transaction->response : null; } public function intercept(ResponseInterface $response) { $this->transaction->response = $response; $this->transaction->exception = null; $this->stopPropagation(); } } 