<?php
 namespace Respect\Validation\Exceptions; class UploadedException extends ValidationException { public static $defaultTemplates = [ self::MODE_DEFAULT => [ self::STANDARD => '{{name}} must be an uploaded file', ], self::MODE_NEGATIVE => [ self::STANDARD => '{{name}} must not be an uploaded file', ], ]; } 