<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class TdSubdivisionCode extends AbstractSearcher { public $haystack = [ 'BA', 'BG', 'BO', 'CB', 'EN', 'EN', 'GR', 'HL', 'KA', 'LC', 'LO', 'LR', 'MA', 'MC', 'ME', 'MO', 'ND', 'OD', 'SA', 'SI', 'TA', 'TI', 'WF', 'EN', ]; public $compareIdentical = true; } 