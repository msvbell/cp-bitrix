<?php
 namespace Respect\Validation\Exceptions; class IdentityCardException extends ValidationException { public static $defaultTemplates = [ self::MODE_DEFAULT => [ self::STANDARD => '{{name}} must be a valid Identity Card number for {{countryCode}}', ], self::MODE_NEGATIVE => [ self::STANDARD => '{{name}} must not be a valid Identity Card number for {{countryCode}}', ], ]; } 