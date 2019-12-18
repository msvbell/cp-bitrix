<?php
namespace GuzzleHttp\Subscriber; use GuzzleHttp\Event\CompleteEvent; use GuzzleHttp\Event\ErrorEvent; use GuzzleHttp\Event\RequestEvents; use GuzzleHttp\Event\SubscriberInterface; use GuzzleHttp\Message\RequestInterface; use GuzzleHttp\Message\ResponseInterface; class History implements SubscriberInterface, \IteratorAggregate, \Countable { private $limit; private $transactions = []; public function __construct($limit = 10) { $this->limit = $limit; } public function getEvents() { return [ 'complete' => ['onComplete', RequestEvents::EARLY], 'error' => ['onError', RequestEvents::EARLY], ]; } public function __toString() { $lines = array(); foreach ($this->transactions as $entry) { $response = isset($entry['response']) ? $entry['response'] : ''; $lines[] = '> ' . trim($entry['sent_request']) . "\n\n< " . trim($response) . "\n"; } return implode("\n", $lines); } public function onComplete(CompleteEvent $event) { $this->add($event->getRequest(), $event->getResponse()); } public function onError(ErrorEvent $event) { if (!$event->getResponse()) { $this->add($event->getRequest()); } } public function getIterator() { return new \ArrayIterator($this->transactions); } public function getRequests($asSent = false) { return array_map(function ($t) use ($asSent) { return $asSent ? $t['sent_request'] : $t['request']; }, $this->transactions); } public function count() { return count($this->transactions); } public function getLastRequest($asSent = false) { return $asSent ? end($this->transactions)['sent_request'] : end($this->transactions)['request']; } public function getLastResponse() { return end($this->transactions)['response']; } public function clear() { $this->transactions = array(); } private function add( RequestInterface $request, ResponseInterface $response = null ) { $this->transactions[] = [ 'request' => $request, 'sent_request' => clone $request, 'response' => $response ]; if (count($this->transactions) > $this->limit) { array_shift($this->transactions); } } } 