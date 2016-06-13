<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Repository\ContactRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $this->assertContains('Liste des contacts', $crawler->filter('.container h2')->text());
    
        $this->assertCount(10, $crawler->filter('.container h2 + table tr'));
    }
    
    public function testListWithMock()
    {
        $client = static::createClient();
        
        // Créer un Mock de Repository (Faux Repository)
        $repo = $this->prophesize(ContactRepository::class);
        $repo->findBy([], ['prenom' => 'ASC'])
             ->willReturn([
                (new Contact)->setId(1)->setPrenom('A')->setNom('B'),
                (new Contact)->setId(2)->setPrenom('C')->setNom('D'),
            ]);
        
        $registry = $this->prophesize(Registry::class);
        $registry->getRepository('AppBundle:Contact')
                 ->willReturn($repo->reveal());
        
        $registry->getConnectionNames()->shouldBeCalled();
        $registry->getManagerNames()->shouldBeCalled();
        
        $client->getContainer()->set('doctrine', $registry->reveal());

        $crawler = $client->request('GET', '/contact/');
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $this->assertContains('Liste des contacts', $crawler->filter('.container h2')->text());
    
        $this->assertCount(2, $crawler->filter('.container h2 + table tr'));
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouter');
    }

}
