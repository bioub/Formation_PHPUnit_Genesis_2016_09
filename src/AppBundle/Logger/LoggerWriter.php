<?php

namespace AppBundle\Logger;

use AppBundle\Writer\FileWriter;
use AppBundle\Writer\WriterInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class LoggerWriter implements LoggerInterface
{
    use LoggerTrait;

    /**
     * @var WriterInterface
     */
    protected $writer;


    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }


    public function log($level, $message, array $context = array())
    {
        $this->writer->write("[$level] $message");
    }
}