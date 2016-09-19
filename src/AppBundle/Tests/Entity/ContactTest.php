<?php

namespace AppBundle\Tests\Entity;

use AppBundle\Entity\Contact;

class ContactTest extends \PHPUnit_Framework_TestCase
{
    public function testPrenom()
    {
        $contact = new Contact();
        $this->assertEquals($contact, $contact->setPrenom('Romain'));
        $this->assertEquals('Romain', $contact->getPrenom());
    }
}