<?php

namespace FineDiffTests\Granularity;

use PHPUnit_Framework_TestCase;
use acedude\FineDiff\Delimiters;
use acedude\FineDiff\Granularity\Word;

class WordTest extends PHPUnit_Framework_TestCase
{
    protected $delimiters = array(
        Delimiters::PARAGRAPH,
        Delimiters::SENTENCE,
        Delimiters::WORD,
    );

    public function setUp()
    {
        $this->character = new Word;
    }

    public function testExtendsAndImplements()
    {
        $this->assertTrue(is_a($this->character, 'acedude\FineDiff\Granularity\Granularity'));
        $this->assertTrue(is_a($this->character, 'acedude\FineDiff\Granularity\GranularityInterface'));
        $this->assertTrue(is_a($this->character, 'ArrayAccess'));
        $this->assertTrue(is_a($this->character, 'Countable'));
    }

    public function testGetDelimiters()
    {
        $this->assertEquals($this->character->getDelimiters(), $this->delimiters);
    }
}