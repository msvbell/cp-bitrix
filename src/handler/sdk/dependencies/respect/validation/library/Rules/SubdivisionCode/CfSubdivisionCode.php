<?php
 namespace Respect\Validation\Rules\SubdivisionCode; use Respect\Validation\Rules\AbstractSearcher; class CfSubdivisionCode extends AbstractSearcher { public $haystack = [ 'AC', 'BB', 'BGF', 'BK', 'HK', 'HM', 'HS', 'KB', 'KG', 'LB', 'MB', 'MP', 'NM', 'OP', 'SE', 'UK', 'VK', ]; public $compareIdentical = true; } 