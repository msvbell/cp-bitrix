<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class MrSubdivisionCode extends AbstractSearcher { public $haystack = [ '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', 'NKC', ]; public $compareIdentical = true; } 