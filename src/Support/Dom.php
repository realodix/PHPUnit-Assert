<?php

namespace Realodix\Dessert\Support;

use Symfony\Component\DomCrawler\Crawler;

/**
 * @internal
 */
final class Dom
{
    /**
     * Given an array of HTML attributes, flatten them into a XPath attribute selector.
     *
     * @param array $attributes HTML attributes and their values.
     *
     * @return string A XPath attribute query selector.
     */
    public static function flattenAttributeArray(array $attributes): string
    {
        array_walk($attributes, function (&$value, $key) {
            // Boolean attributes.
            if (\is_null($value)) {
                $value = sprintf('[%s]', $key);
            } else {
                $value = sprintf('[%s="%s"]', $key, htmlspecialchars($value));
            }
        });

        return implode('', $attributes);
    }

    /**
     * Given HTML markup and a DOM selector query, collect the innerHTML of the matched
     * selectors.
     *
     * @param string $markup The HTML for the DOMDocument.
     * @param string $query  The DOM selector query.
     *
     * @return string The concatenated innerHTML of any matched selectors.
     */
    public static function getInnerHtmlOfMatchedElements(string $markup, string $query): string
    {
        $results = self::executeQuery($markup, $query);
        $contents = [];

        // Loop through results and collect their innerHTML values.
        foreach ($results as $result) {
            $document = new \DOMDocument;
            $document->appendChild($document->importNode($result->firstChild, true));

            $contents[] = trim($document->saveHTML());
        }

        return implode(PHP_EOL, $contents);
    }

    /**
     * Build a new DOMDocument from the given markup, then execute a query against it.
     *
     * @param string $content The HTML for the DOMDocument.
     * @param string $query   The DOM selector query.
     */
    public static function executeQuery(string $content, string $query): Crawler
    {
        $crawler = new Crawler($content);

        return $crawler->filter($query);
    }
}
