<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 19/09/2016
 * Time: 11:08
 */

namespace AppBundle\Writer;


class FileWriter implements WriterInterface
{
    protected $fic;

    public function __construct($filePath)
    {
        $this->fic = fopen($filePath, 'a');
    }

    public function write($message)
    {
        fwrite($this->fic, "$message\n");
    }

    public function __destruct()
    {
        fclose($this->fic);
    }
}