<?php
namespace GuzzleHttp\Event; use GuzzleHttp\Transaction; class ProgressEvent extends AbstractRequestEvent { public $downloadSize; public $downloaded; public $uploadSize; public $uploaded; public function __construct( Transaction $transaction, $downloadSize, $downloaded, $uploadSize, $uploaded ) { parent::__construct($transaction); $this->downloadSize = $downloadSize; $this->downloaded = $downloaded; $this->uploadSize = $uploadSize; $this->uploaded = $uploaded; } } 