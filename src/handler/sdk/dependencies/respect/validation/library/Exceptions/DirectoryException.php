<?php
 namespace Respect\Validation\Exceptions; class DirectoryException extends ValidationException { public static $defaultTemplates = [ self::MODE_DEFAULT => [ self::STANDARD => '{{name}} must be a directory', ], self::MODE_NEGATIVE => [ self::STANDARD => '{{name}} must not be a directory', ], ]; } 