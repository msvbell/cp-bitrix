<?php
 namespace Respect\Validation\Exceptions; class RomanException extends ValidationException { public static $defaultTemplates = [ self::MODE_DEFAULT => [ self::STANDARD => '{{name}} must be a valid roman number', ], self::MODE_NEGATIVE => [ self::STANDARD => '{{name}} must not be a valid roman number', ], ]; } 