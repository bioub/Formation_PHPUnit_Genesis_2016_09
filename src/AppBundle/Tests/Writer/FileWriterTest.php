<?php

namespace AppBundle\Tests\Writer;


use AppBundle\Writer\FileWriter;

class FileWriterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FileWriter
     */
    protected $fw;

    const FILEPATH = PROJECT_PATH . '/var/logs/meslogstest.log';

    public function setUp()
    {
        $this->fw = new FileWriter(self::FILEPATH);
    }

    public function testWrite()
    {
        $this->fw->write('Coucou');
        $this->assertStringEqualsFile(self::FILEPATH, "Coucou\n");
        $this->fw = null;
    }

    public function tearDown()
    {
        unlink(self::FILEPATH);
    }
}