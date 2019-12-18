<?php
 namespace Respect\Validation\Rules; use finfo; use SplFileInfo; class Mimetype extends AbstractRule { public $mimetype; private $fileInfo; public function __construct($mimetype, finfo $fileInfo = null) { $this->mimetype = $mimetype; $this->fileInfo = $fileInfo ?: new finfo(FILEINFO_MIME_TYPE); } public function validate($input) { if ($input instanceof SplFileInfo) { $input = $input->getPathname(); } if (!is_string($input)) { return false; } if (!is_file($input)) { return false; } return ($this->fileInfo->file($input) == $this->mimetype); } } 