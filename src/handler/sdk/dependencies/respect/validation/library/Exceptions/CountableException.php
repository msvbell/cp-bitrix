<?php
 namespace Respect\Validation\Exceptions; class CountableException extends ValidationException { public static $defaultTemplates = [ self::MODE_DEFAULT => [ self::STANDARD => '{{name}} must be countable', ], self::MODE_NEGATIVE => [ self::STANDARD => '{{name}} must not be countable', ], ]; } 