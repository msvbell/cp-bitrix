<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class TcSubdivisionCode extends AbstractSearcher { public $haystack = [ 'AC', 'DC', 'EC', 'FC', 'GT', 'LW', 'MC', 'NC', 'PN', 'PR', 'RC', 'SC', 'SL', 'WC', ]; public $compareIdentical = true; } 