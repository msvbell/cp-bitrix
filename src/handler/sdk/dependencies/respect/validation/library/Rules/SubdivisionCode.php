<?php
 namespace Respect\Validation\Rules; use Respect\Validation\Exceptions\ComponentException; class SubdivisionCode extends AbstractWrapper { public $countryCode; public function __construct($countryCode) { $shortName = ucfirst(strtolower($countryCode)).'SubdivisionCode'; $className = __NAMESPACE__.'\\SubdivisionCode\\'.$shortName; if (!class_exists($className)) { throw new ComponentException(sprintf('"%s" is not a valid country code in ISO 3166-2', $countryCode)); } $this->countryCode = $countryCode; $this->validatable = new $className(); } } 