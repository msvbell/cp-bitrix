<?php
 namespace Respect\Validation\Exceptions; class ZendException extends NestedValidationException { public static $defaultTemplates = [ self::MODE_DEFAULT => [ self::STANDARD => '{{name}}', ], self::MODE_NEGATIVE => [ self::STANDARD => '{{name}}', ], ]; } 