<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class CkSubdivisionCode extends AbstractSearcher { public $haystack = [ 'AI', 'AT', 'MA', 'MG', 'MK', 'MT', 'MU', 'NI', 'PA', 'PE', 'PU', 'RK', 'RR', 'SU', 'TA', ]; public $compareIdentical = true; } 