<?php

use Surveyor\IdentityMap;
use Surveyor\DomainObject;

class IdentityMapTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Surveyor\IdentityMap
     */
    protected $map;

    public function setUp()
    {
        $this->map = new IdentityMap();
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf('Surveyor\IdentityMap', $this->map);
    }

    public function testCanAddUniqueIdentites()
    {
        $obj1 = new DomainObject();
        $obj2 = new DomainObject();
        $this->map->add(1, $obj1);
        $this->map->add(2, $obj2);

        $this->assertAttributeContains($obj1, 'map', $this->map);
        $this->assertAttributeContains($obj2, 'map', $this->map);
    }

    public function testCannotAddNonUniqueIdentites()
    {
        $obj1 = new DomainObject();
        $obj2 = new DomainObject();
        $this->map->add(1, $obj1);

        $this->setExpectedException('InvalidArgumentException');
        $this->map->add(1, $obj2);
    }

    public function testContains()
    {
        $this->map->add(1, new DomainObject());
        $this->assertTrue($this->map->contains(1));
        $this->assertFalse($this->map->contains(2));
    }

    public function testGetWhenExists()
    {
        $obj = new DomainObject();
        $this->map->add(1, $obj);
        $this->assertEquals($obj, $this->map->get(1));
    }

    public function testGetWhenMissing()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->map->get(1);
    }
}
 