<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Manager\ContactManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    /**
     * @coversNothing
     * @group functional
     */
    public function testList()
    {
        $client = static::createClient();

        $contacts = [
            (new Contact())->setPrenom('A')->setNom('B'),
            (new Contact())->setPrenom('C')->setNom('D'),
            (new Contact())->setPrenom('E')->setNom('F'),
        ];

        $mockManager = $this->prophesize(ContactManager::class);
        $mockManager->findAll()->willReturn($contacts)->shouldBeCalledTimes(1);

        $client->getContainer()->set('app.manager.contact', $mockManager->reveal());

        $crawler = $client->request('GET', '/contacts/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertCount(3, $crawler->filter('ul > li'));
        $this->assertContains('A B', $crawler->filter('ul > li')->first()->text());
    }

}
