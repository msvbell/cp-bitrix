<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class BzSubdivisionCode extends AbstractSearcher { public $haystack = [ 'BZ', 'CY', 'CZL', 'OW', 'SC', 'TOL', ]; public $compareIdentical = true; } 