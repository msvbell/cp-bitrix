<?php
namespace GuzzleHttp\Ring\Future; use React\Promise\PromiseInterface; use React\Promise\PromisorInterface; interface FutureInterface extends PromiseInterface, PromisorInterface { public function wait(); public function cancel(); } 