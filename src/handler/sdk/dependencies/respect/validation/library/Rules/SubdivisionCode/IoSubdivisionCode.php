<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class IoSubdivisionCode extends AbstractSearcher { public $haystack = [ 'DG', 'DI', 'EA', 'EG', 'NI', 'PB', 'SI', 'TB', ]; public $compareIdentical = true; } 