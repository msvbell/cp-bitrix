<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class MpSubdivisionCode extends AbstractSearcher { public $haystack = [ 'N', 'R', 'S', 'T', ]; public $compareIdentical = true; } 