<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class LcSubdivisionCode extends AbstractSearcher { public $haystack = [ 'AR', 'CA', 'CH', 'DA', 'DE', 'GI', 'LA', 'MI', 'PR', 'SO', 'VF', ]; public $compareIdentical = true; } 