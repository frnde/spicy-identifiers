<?php

namespace Monospice\SpicyIdentifiers;

use Monospice\SpicyIdentifiers\Tools\Parser;

/**
 * Contains factory methods that help to instantiate new instances of
 * DynamicIdentifier classes
 *
 * @category Package
 * @package  Monospice\SpicyIdentifiers
 * @author   Cy Rossignol <cy@rossignols.me>
 * @license  See LICENSE file
 * @link     https://github.com/monospice/spicy-identifiers
 */
trait MakesDynamicIdentifiers
{
    /**
     * Make an instance and load the specified identifier as a single part
     * without parsing it
     *
     * @param string $identifier The identifier name string to load
     *
     * @return self An instance of this class with one identifier part that
     * equals the provided identifier string
     */
    public static function load($identifier)
    {
        return new static([ $identifier ]);
    }

    /**
     * Make an instance by breaking an identifier name into parts using the
     * default case format specified on the exhibiting class
     *
     * @param string $identifier The identifier name string to parse
     *
     * @return self An instance of this class with the parsed identifier parts
     */
    public static function parse($identifier)
    {
        return new static(Parser::parse($identifier, static::$defaultCase));
    }

    /**
     * Make an instance by breaking an identifier into parts based on words
     * starting with uppercase characters in camel case
     *
     * @param string $identifier The identifier name string to parse
     *
     * @return self An instance of this class with the parsed identifier parts
     */
    public static function parseFromCamelCase($identifier)
    {
        return new static(Parser::parseFromCamelCase($identifier));
    }

    /**
     * Make an instance by breaking an identifier containing extended ASCII
     * characters into parts based on words starting with uppercase characters
     * in camel case
     *
     * @param string $identifier The identifier name string to parse
     *
     * @return self An instance of this class with the parsed identifier parts
     */
    public static function parseFromCamelCaseExtended($identifier)
    {
        return new static(Parser::parseFromCamelCaseExtended($identifier));
    }

    /**
     * Make an instance by breaking an identifier into parts based on words
     * seperated by underscores
     *
     * @param string $identifier The identifier name string to parse
     *
     * @return self An instance of this class with the parsed identifier parts
     */
    public static function parseFromUnderscore($identifier)
    {
        return new static(Parser::parseFromUnderscore($identifier));
    }

    /**
     * Make an instance by breaking an identifier into parts based on words
     * seperated by hyphens
     *
     * @param string $identifier The identifier name string to parse
     *
     * @return self An instance of this class with the parsed identifier parts
     */
    public static function parseFromHyphen($identifier)
    {
        return new static(Parser::parseFromHyphen($identifier));
    }

    /**
     * Make an instance by breaking an identifier into parts based on words
     * seperated by multiple case formats
     *
     * @param string $identifier The identifier name string to parse
     * @param array  $formats    The string constants representing the case
     * formats to attempt to parse the identifier from
     *
     * @return self An instance of this class with the parsed identifier parts
     *
     * @see \Monospice\SpicyIdentifiers\Tools\CaseFormat For the available
     * case formats
     */
    public static function parseFromMixedCase($identifier, array $formats)
    {
        return new static(Parser::parseFromMixedCase($identifier, $formats));
    }
}