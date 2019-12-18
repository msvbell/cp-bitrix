<?php
namespace GuzzleHttp\Stream; use GuzzleHttp\Stream\Exception\CannotAttachException; class AppendStream implements StreamInterface { private $streams = []; private $seekable = true; private $current = 0; private $pos = 0; private $detached = false; public function __construct(array $streams = []) { foreach ($streams as $stream) { $this->addStream($stream); } } public function __toString() { try { $this->seek(0); return $this->getContents(); } catch (\Exception $e) { return ''; } } public function addStream(StreamInterface $stream) { if (!$stream->isReadable()) { throw new \InvalidArgumentException('Each stream must be readable'); } if (!$stream->isSeekable()) { $this->seekable = false; } $this->streams[] = $stream; } public function getContents() { return Utils::copyToString($this); } public function close() { $this->pos = $this->current = 0; foreach ($this->streams as $stream) { $stream->close(); } $this->streams = []; } public function detach() { $this->close(); $this->detached = true; } public function attach($stream) { throw new CannotAttachException(); } public function tell() { return $this->pos; } public function getSize() { $size = 0; foreach ($this->streams as $stream) { $s = $stream->getSize(); if ($s === null) { return null; } $size += $s; } return $size; } public function eof() { return !$this->streams || ($this->current >= count($this->streams) - 1 && $this->streams[$this->current]->eof()); } public function seek($offset, $whence = SEEK_SET) { if (!$this->seekable || $whence !== SEEK_SET) { return false; } $success = true; $this->pos = $this->current = 0; foreach ($this->streams as $stream) { if (!$stream->seek(0)) { $success = false; } } if (!$success) { return false; } while ($this->pos < $offset && !$this->eof()) { $this->read(min(8096, $offset - $this->pos)); } return $this->pos == $offset; } public function read($length) { $buffer = ''; $total = count($this->streams) - 1; $remaining = $length; while ($remaining > 0) { if ($this->streams[$this->current]->eof()) { if ($this->current == $total) { break; } $this->current++; } $buffer .= $this->streams[$this->current]->read($remaining); $remaining = $length - strlen($buffer); } $this->pos += strlen($buffer); return $buffer; } public function isReadable() { return true; } public function isWritable() { return false; } public function isSeekable() { return $this->seekable; } public function write($string) { return false; } public function getMetadata($key = null) { return $key ? null : []; } } 