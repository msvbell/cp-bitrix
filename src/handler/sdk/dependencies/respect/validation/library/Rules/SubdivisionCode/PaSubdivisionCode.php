<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class PaSubdivisionCode extends AbstractSearcher { public $haystack = [ '1', '2', '3', '4', '5', '6', '7', '8', '9', 'EM', 'KY', 'NB', ]; public $compareIdentical = true; } 