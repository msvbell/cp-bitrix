<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class PySubdivisionCode extends AbstractSearcher { public $haystack = [ '1', '10', '11', '12', '13', '14', '15', '16', '19', '2', '3', '4', '5', '6', '7', '8', '9', 'ASU', ]; public $compareIdentical = true; } 