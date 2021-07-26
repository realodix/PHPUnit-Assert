<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert;
use Realodix\NextProject\Extend\AssertMixed;
use Realodix\NextProject\Extend\AssertModified;
use Realodix\NextProject\Support\Markup;
use Realodix\NextProject\Support\Validator;

trait ExtendedTrait
{
    public function contains($needle, string $message = ''): self
    {
        AssertModified::assertContains($needle, $this->actual, $message);

        return $this;
    }

    public function notContains($needle, string $message = ''): self
    {
        AssertModified::assertNotContains($needle, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFile(string $expectedFile, string $message = ''): self
    {
        AssertModified::assertStringEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFile(string $expectedFile, string $message = ''): self
    {
        AssertModified::assertStringNotEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringEquals(string $expected, string $message = ''): self
    {
        AssertModified::stringEquals($expected, $this->actual, $message);

        return $this;
    }

    public function stringNotEquals(string $expected, string $message = ''): self
    {
        AssertModified::stringNotEquals($expected, $this->actual, $message);

        return $this;
    }

    public function stringContainsStringIgnoringLineEndings(string $needle, string $message = ''): self
    {
        AssertMixed::stringContainsStringIgnoringLineEndings($needle, $this->actual, $message);

        return $this;
    }

    public function stringEqualIgnoringLineEndings(string $expected, string $message = ''): self
    {
        AssertMixed::stringEqualIgnoringLineEndings($expected, $this->actual, $message);

        return $this;
    }

    public function fileEqualsString(string $expectedString, string $message = ''): self
    {
        AssertMixed::fileEqualsString($expectedString, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsString(string $expectedString, string $message = ''): self
    {
        AssertMixed::fileNotEqualsString($expectedString, $this->actual, $message);

        return $this;
    }

    public function fileEqualsStringIgnoringCase(string $expectedString, string $message = ''): self
    {
        AssertMixed::fileEqualsStringIgnoringCase($expectedString, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsStringIgnoringCase(string $expectedString, string $message = ''): self
    {
        AssertMixed::fileNotEqualsStringIgnoringCase($expectedString, $this->actual, $message);

        return $this;
    }

    /**
     * Assert that the given string contains an element matching the given selector.
     *
     * @param string $selector A query $selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupContainsSelector(string $selector, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $results = Markup::executeDomQuery($actual, $selector);

        Assert::assertGreaterThan(0, \count($results), $message);

        return $this;
    }

    /**
     * Assert that the given string does not contain an element matching the given selector.
     *
     * @param string $selector A query $selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupNotContainsSelector(string $selector, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $results = Markup::executeDomQuery($actual, $selector);

        Assert::assertEquals(0, \count($results), $message);

        return $this;
    }

    /**
     * Assert an element's contents contain the given string.
     *
     * @param string $contents The string to look for within the DOM node's contents.
     * @param string $selector A query selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementContains(string $contents, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $matchedElements = Markup::getInnerHtmlOfMatchedElements($actual, $selector);

        Assert::assertStringContainsString($contents, $matchedElements, $message);

        return $this;
    }

    /**
     * Assert an element's contents do not contain the given string.
     *
     * @param string $contents The string to look for within the DOM node's contents.
     * @param string $selector A query $selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementNotContains(string $contents, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $matchedElements = Markup::getInnerHtmlOfMatchedElements($actual, $selector);

        Assert::assertStringNotContainsString($contents, $matchedElements, $message);

        return $this;
    }

    /**
     * Assert an element's contents contain the given regular expression pattern.
     *
     * @param string $regexp   The regular expression pattern to look for within the DOM node.
     * @param string $selector A query $selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $matchedElements = Markup::getInnerHtmlOfMatchedElements($actual, $selector);

        $this->and($matchedElements)->matchesRegularExpression($regexp, $message);

        return $this;
    }

    /**
     * Assert an element's contents do not contain the given regular expression pattern.
     *
     * @param string $regexp   The regular expression pattern to look for within the DOM node.
     * @param string $selector A query $selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementNotRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $matchedElements = Markup::getInnerHtmlOfMatchedElements($actual, $selector);

        $this->and($matchedElements)->doesNotMatchRegularExpression($regexp, $message);

        return $this;
    }

    /**
     * Assert that an element with the given attributes exists in the given markup.
     *
     * @param array  $attributes An array of HTML attributes that should be found on the element.
     * @param string $message    A message to display if the assertion fails.
     */
    public function markupHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        $attributes = '*'.Markup::flattenAttributeArray($attributes);

        $this->markupContainsSelector($attributes, $message);

        return $this;
    }

    /**
     * Assert that an element with the given attributes does not exist in the given markup.
     *
     * @param array  $attributes An array of HTML attributes that should be found on the element.
     * @param string $message    A message to display if the assertion fails.
     */
    public function markupNotHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        $attributes = '*'.Markup::flattenAttributeArray($attributes);
        $this->markupNotContainsSelector($attributes, $message);

        return $this;
    }

    /**
     * Assert the number of times an element matching the given selector is found.
     *
     * @param int    $count    The number of matching elements expected.
     * @param string $selector A query selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupSelectorCount(int $count, string $selector, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $results = Markup::executeDomQuery($actual, $selector);

        Assert::assertCount($count, $results, $message);

        return $this;
    }
}
