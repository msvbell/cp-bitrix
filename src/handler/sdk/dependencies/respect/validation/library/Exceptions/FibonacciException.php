<?php
 namespace Respect\Validation\Exceptions; class FibonacciException extends ValidationException { public static $defaultTemplates = [ self::MODE_DEFAULT => [ self::STANDARD => '{{name}} must be a valid Fibonacci number', ], self::MODE_NEGATIVE => [ self::STANDARD => '{{name}} must not be a valid Fibonacci number', ], ]; } 