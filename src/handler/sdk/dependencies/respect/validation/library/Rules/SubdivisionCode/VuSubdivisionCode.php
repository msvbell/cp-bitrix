<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class VuSubdivisionCode extends AbstractSearcher { public $haystack = [ 'MAP', 'PAM', 'SAM', 'SEE', 'TAE', 'TOB', ]; public $compareIdentical = true; } 