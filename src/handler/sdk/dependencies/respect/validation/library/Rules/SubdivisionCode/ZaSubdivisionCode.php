<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class ZaSubdivisionCode extends AbstractSearcher { public $haystack = [ 'EC', 'FS', 'GP', 'LP', 'MP', 'NC', 'NW', 'WC', 'ZN', ]; public $compareIdentical = true; } 