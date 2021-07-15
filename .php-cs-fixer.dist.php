<?php

use Realodix\CsConfig\Factory;
use Realodix\CsConfig\RuleSet;

$overrideRules = [
    'PhpCsFixerCustomFixers/phpdoc_no_superfluous_param' => false,
    'ordered_class_elements' => ['sort_algorithm' => 'alpha'],
];

return Factory::fromRuleSet(new RuleSet\RealodixPlus, $overrideRules);
