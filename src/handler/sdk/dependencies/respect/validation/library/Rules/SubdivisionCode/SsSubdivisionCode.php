<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class SsSubdivisionCode extends AbstractSearcher { public $haystack = [ 'BN', 'BW', 'EC', 'EE', 'EW', 'JG', 'LK', 'NU', 'UY', 'WR', ]; public $compareIdentical = true; } 