<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class CgSubdivisionCode extends AbstractSearcher { public $haystack = [ '11', '12', '13', '14', '15', '16', '2', '5', '7', '8', '9', 'BZV', ]; public $compareIdentical = true; } 