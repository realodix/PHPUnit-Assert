<?php

namespace Realodix\NextProject\Helpers;

/**
 * Helper functions for working with the resource type.
 *
 * @internal
 */
final class ResourceHelper
{
    /**
     * Determines whether a variable represents a closed resource.
     *
     * @param mixed $actual The variable to test.
     *
     * @return bool
     */
    public static function isClosedResource($actual)
    {
        if (gettype($actual) === 'resource (closed)') {
            return true;
        }

        return false;
    }
}
