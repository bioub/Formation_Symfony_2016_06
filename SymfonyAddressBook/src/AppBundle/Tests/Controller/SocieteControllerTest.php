<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Manager\SocieteManager;
use Proxies\__CG__\AppBundle\Entity\Societe;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SocieteControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();
        
        $manager = $this->prophesize(SocieteManager::class);
        $manager->getAll()->willReturn([
            (new Societe)->setId(1)->setNom('A')->setVille('B'),
            (new Societe)->setId(2)->setNom('C')->setVille('D'),
        ])->shouldBeCalledTimes(1);
        
        $client->getContainer()->set('app.manager.societe', $manager->reveal());

        $crawler = $client->request('GET', '/societe/');
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Liste des sociétés', $crawler->filter('.container h2')->text());
        $this->assertCount(2, $crawler->filter('.container h2 + table tr'));
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}');
    }

}
