<?php

namespace Dedoc\Scramble\Infer\Extensions\Event;

use Dedoc\Scramble\Infer\Extensions\Event\Concerns\ArgumentTypesAware;
use Dedoc\Scramble\Infer\Scope\Scope;

class StaticMethodCallEvent
{
    use ArgumentTypesAware;

    public function __construct(
        public readonly string $callee,
        public readonly string $name,
        public readonly Scope $scope,
        public readonly array $arguments,
    ) {
    }

    public function getDefinition()
    {
        return $this->scope->index->getClassDefinition($this->callee);
    }

    public function getName()
    {
        return $this->callee;
    }
}
