<?php
namespace GuzzleHttp\Stream; class AsyncReadStream implements StreamInterface { use StreamDecoratorTrait; private $drain; private $pump; private $hwm; private $needsDrain; private $size; public function __construct( StreamInterface $buffer, array $config = [] ) { if (!$buffer->isReadable() || !$buffer->isWritable()) { throw new \InvalidArgumentException( 'Buffer must be readable and writable' ); } if (isset($config['size'])) { $this->size = $config['size']; } static $callables = ['pump', 'drain']; foreach ($callables as $check) { if (isset($config[$check])) { if (!is_callable($config[$check])) { throw new \InvalidArgumentException( $check . ' must be callable' ); } $this->{$check} = $config[$check]; } } $this->hwm = $buffer->getMetadata('hwm'); if ($this->hwm === null) { $this->drain = null; } $this->stream = $buffer; } public static function create(array $options = []) { $maxBuffer = isset($options['max_buffer']) ? $options['max_buffer'] : null; if ($maxBuffer === 0) { $buffer = new NullStream(); } elseif (isset($options['buffer'])) { $buffer = $options['buffer']; } else { $hwm = isset($options['hwm']) ? $options['hwm'] : 16384; $buffer = new BufferStream($hwm); } if ($maxBuffer > 0) { $buffer = new DroppingStream($buffer, $options['max_buffer']); } if (isset($options['write'])) { $onWrite = $options['write']; $buffer = FnStream::decorate($buffer, [ 'write' => function ($string) use ($buffer, $onWrite) { $result = $buffer->write($string); $onWrite($buffer, $string); return $result; } ]); } return [$buffer, new self($buffer, $options)]; } public function getSize() { return $this->size; } public function isWritable() { return false; } public function write($string) { return false; } public function read($length) { if (!$this->needsDrain && $this->drain) { $this->needsDrain = $this->stream->getSize() >= $this->hwm; } $result = $this->stream->read($length); if ($this->needsDrain && $this->stream->getSize() === 0) { $this->needsDrain = false; $drainFn = $this->drain; $drainFn($this->stream); } $resultLen = strlen($result); if ($this->pump && $resultLen < $length) { $pumpFn = $this->pump; $result .= $pumpFn($length - $resultLen); } return $result; } } 