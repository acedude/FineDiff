<?php

namespace FineDiffTests\Granularity;

use PHPUnit_Framework_TestCase;
use acedude\FineDiff\Delimiters;
use acedude\FineDiff\Granularity\Paragraph;

class ParagraphTest extends PHPUnit_Framework_TestCase
{
    protected $delimiters = array(
        Delimiters::PARAGRAPH,
    );

    public function setUp()
    {
        $this->character = new Paragraph;
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