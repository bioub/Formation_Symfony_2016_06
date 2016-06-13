<?php

namespace AppBundle\Tests\Entity;

use AppBundle\Entity\Contact;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit_Framework_TestCase;

class ContactTest extends PHPUnit_Framework_TestCase
{
//    public function test1plus1Egal2()
//    {
//        $this->assertEquals(2, 1 + 1);
//    }
    
    protected $contact;
    
    protected function setUp() {
        $this->contact = new Contact();
    }
    
    public function testInitialValues()
    {
        $this->assertNull($this->contact->getId());
        $this->assertNull($this->contact->getPrenom());
        $this->assertNull($this->contact->getNom());
        $this->assertNull($this->contact->getEmail());
        $this->assertNull($this->contact->getDateNaissance());
        $this->assertNull($this->contact->getSociete());
        $this->assertInstanceOf(ArrayCollection::class, $this->contact->getGroupes());
    }
    
    public function testGetSetPrenom()
    {
        $this->contact->setPrenom('Romain');
        $this->assertEquals('Romain', $this->contact->getPrenom());
    }
}