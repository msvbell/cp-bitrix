<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class PwSubdivisionCode extends AbstractSearcher { public $haystack = [ '002', '004', '010', '050', '100', '150', '212', '214', '218', '222', '224', '226', '227', '228', '350', '370', ]; public $compareIdentical = true; } 