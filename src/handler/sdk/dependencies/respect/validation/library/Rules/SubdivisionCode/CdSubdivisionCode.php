<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class CdSubdivisionCode extends AbstractSearcher { public $haystack = [ 'BC', 'BN', 'EQ', 'KA', 'KE', 'KN', 'KW', 'MA', 'NK', 'OR', 'SK', ]; public $compareIdentical = true; } 