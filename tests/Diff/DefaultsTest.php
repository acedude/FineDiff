<?php

namespace FineDiffTests\Diff;

use PHPUnit_Framework_TestCase;
use acedude\FineDiff\Diff;

class DefaultsTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->diff = new Diff;
    }

    public function testGetGranularity()
    {
        $this->assertTrue(is_a($this->diff->getGranularity(), 'acedude\FineDiff\Granularity\Character'));
        $this->assertTrue(is_a($this->diff->getGranularity(), 'acedude\FineDiff\Granularity\Granularity'));
        $this->assertTrue(is_a($this->diff->getGranularity(), 'acedude\FineDiff\Granularity\GranularityInterface'));
    }

    public function testGetRenderer()
    {
        $this->assertTrue(is_a($this->diff->getRenderer(), 'acedude\FineDiff\Render\Html'));
        $this->assertTrue(is_a($this->diff->getRenderer(), 'acedude\FineDiff\Render\Renderer'));
        $this->assertTrue(is_a($this->diff->getRenderer(), 'acedude\FineDiff\Render\RendererInterface'));
    }

    public function testGetParser()
    {
        $this->assertTrue(is_a($this->diff->getParser(), 'acedude\FineDiff\Parser\Parser'));
        $this->assertTrue(is_a($this->diff->getParser(), 'acedude\FineDiff\Parser\ParserInterface'));
    }
}