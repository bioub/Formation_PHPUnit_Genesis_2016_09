<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 19/09/2016
 * Time: 11:09
 */

namespace AppBundle\Writer;


interface WriterInterface
{
    public function write($message);
}