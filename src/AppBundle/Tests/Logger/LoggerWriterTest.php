<?php

namespace AppBundle\Tests\Logger;

use AppBundle\Logger\LoggerWriter;
use AppBundle\Tests\Writer\FakeWriter;
use AppBundle\Writer\FileWriter;

class LoggerWriterTest extends \PHPUnit_Framework_TestCase
{

    public function testLogAvecFake()
    {
        $fakeWriter = new FakeWriter();
        $logger = new LoggerWriter($fakeWriter);
        $logger->log('warning', 'Coucou');
    }

    public function testLogAvecDummyPhpunit()
    {
        $dummyWriter = $this->getMockBuilder(FileWriter::class)
                            ->disableOriginalConstructor()
                            ->getMock();

        $logger = new LoggerWriter($dummyWriter);
        $logger->log('warning', 'Coucou');
    }

    public function testLogAvecDummyProphecy()
    {
        $dummyWriter = $this->prophesize(FileWriter::class);

        $logger = new LoggerWriter($dummyWriter->reveal());
        $logger->log('warning', 'Coucou');
    }

    public function testLogAvecMockPhpunit()
    {
        $mockWriter = $this->getMockBuilder(FileWriter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockWriter->expects($this->once())
                   ->method('write')
                   ->with('[warning] Coucou');

        $logger = new LoggerWriter($mockWriter);
        $logger->log('warning', 'Coucou');
    }

    public function testLogAvecMockProphecy()
    {
        $mockWriter = $this->prophesize(FileWriter::class);
        $mockWriter->write('[warning] Coucou')->shouldBeCalledTimes(1);

        $logger = new LoggerWriter($mockWriter->reveal());
        $logger->log('warning', 'Coucou');
    }
}