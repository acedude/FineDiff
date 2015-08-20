<?php

namespace FineDiffTests\Parser;

use PHPUnit_Framework_TestCase;
use Mockery as m;
use acedude\FineDiff\Granularity\Character;
use acedude\FineDiff\Parser\Parser;

class ParserTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $granularity  = new Character;
        $this->parser = new Parser($granularity);
    }

    public function tearDown()
    {
        m::close();
    }

    public function testInstanceOf()
    {
        $this->assertTrue(is_a($this->parser, 'acedude\FineDiff\Parser\ParserInterface'));
    }

    public function testDefaultOpcodes()
    {
        $opcodes = $this->parser->getOpcodes();
        $this->assertTrue(is_a($opcodes, 'acedude\FineDiff\Parser\OpcodesInterface'));
    }

    public function testSetOpcodes()
    {
        $opcodes = m::mock('acedude\FineDiff\Parser\Opcodes');
        $opcodes->shouldReceive('foo')->andReturn('bar');
        $this->parser->setOpcodes($opcodes);

        $opcodes = $this->parser->getOpcodes();
        $this->assertEquals($opcodes->foo(), 'bar');
    }

    /**
     * @expectedException acedude\FineDiff\Exceptions\GranularityCountException
     */
    public function testParseBadGranularity()
    {
        $granularity = m::mock('acedude\FineDiff\Granularity\Character');
        $granularity->shouldReceive('count')->andReturn(0);
        $parser = new Parser($granularity);

        $parser->parse('hello world', 'hello2 worl');
    }

    public function testParseSetOpcodes()
    {
        $opcodes = m::mock('acedude\FineDiff\Parser\Opcodes');
        $opcodes->shouldReceive('setOpcodes')->once();
        $this->parser->setOpcodes($opcodes);

        $this->parser->parse('Hello worlds', 'Hello2 world');
    }
}
