<?php

/**
 * FINE granularity DIFF
 *
 * Computes a set of instructions to convert the content of
 * one string into another.
 *
 * Originally created by Raymond Hill (https://github.com/gorhill/PHP-FineDiff), brought up
 * to date by Cog Powered (https://github.com/acedude/FineDiff).
 *
 * @copyright Copyright 2011 (c) Raymond Hill (http://raymondhill.net/blog/?p=441)
 * @copyright Copyright 2013 (c) Robert Crowe (http://acedude.com)
 * @link https://github.com/acedude/FineDiff
 * @version 0.0.1
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace acedude\FineDiff\Parser;

use acedude\FineDiff\Granularity\GranularityInterface;

interface ParserInterface
{
    /**
     * Creates an instance.
     *
     * @param acedude\FineDiff\Granularity\GranularityInterface
     */
    public function __construct(GranularityInterface $granularity);

    /**
     * Granularity the parser is working with.
     *
     * Default is acedude\FineDiff\Granularity\Character.
     *
     * @see acedude\FineDiff\Granularity\Character
     * @see acedude\FineDiff\Granularity\Word
     * @see acedude\FineDiff\Granularity\Sentence
     * @see acedude\FineDiff\Granularity\Paragraph
     *
     * @return acedude\FineDiff\Granularity\GranularityInterface
     */
    public function getGranularity();

    /**
     * Set the granularity that the parser is working with.
     *
     * @see acedude\FineDiff\Granularity\Character
     * @see acedude\FineDiff\Granularity\Word
     * @see acedude\FineDiff\Granularity\Sentence
     * @see acedude\FineDiff\Granularity\Paragraph
     *
     * @param acedude\FineDiff\Granularity\GranularityInterface
     * @return void
     */
    public function setGranularity(GranularityInterface $granularity);

    /**
     * Get the opcodes object that is used to store all the opcodes.
     *
     * @return acedude\FineDiff\Parser\OpcodesInterface
     */
    public function getOpcodes();

    /**
     * Set the opcodes object used to store all the opcodes for this parse.
     *
     * @param acedude\FineDiff\Parser\OpcodesInterface $opcodes.
     * @return void
     */
    public function setOpcodes(OpcodesInterface $opcodes);

    /**
     * Generates the opcodes needed to transform one string to another.
     *
     * @param string $from_text
     * @param string $to_text
     * @throws acedude\FineDiff\Exceptions\GranularityCountException
     * @return acedude\FineDiff\Parser\OpcodesInterface
     */
    public function parse($from_text, $to_text);
}