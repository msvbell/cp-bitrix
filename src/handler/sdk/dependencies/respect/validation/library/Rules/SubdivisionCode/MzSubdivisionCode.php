<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class MzSubdivisionCode extends AbstractSearcher { public $haystack = [ 'A', 'B', 'G', 'I', 'L', 'MPM', 'N', 'P', 'Q', 'S', 'T', ]; public $compareIdentical = true; } 