<?php
 namespace Respect\Validation\Exceptions; class EqualsException extends ValidationException { public static $defaultTemplates = [ self::MODE_DEFAULT => [ self::STANDARD => '{{name}} must be equals {{compareTo}}', ], self::MODE_NEGATIVE => [ self::STANDARD => '{{name}} must not be equals {{compareTo}}', ], ]; } 