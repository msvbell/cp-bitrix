<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class GnSubdivisionCode extends AbstractSearcher { public $haystack = [ 'B', 'C', 'D', 'F', 'K', 'L', 'M', 'N', 'BE', 'BF', 'BK', 'CO', 'DB', 'DI', 'DL', 'DU', 'FA', 'FO', 'FR', 'GA', 'GU', 'KA', 'KB', 'KD', 'KE', 'KN', 'KO', 'KS', 'LA', 'LE', 'LO', 'MC', 'MD', 'ML', 'MM', 'NZ', 'PI', 'SI', 'TE', 'TO', 'YO', ]; public $compareIdentical = true; } 