<?php

use Surveyor\DomainObject;

class DomainObjectTest extends PHPUnit_Framework_TestCase
{
    public function testCanInstantiate()
    {
        $obj = new DomainObject();
        $this->assertInstanceOf('Surveyor\DomainObject', $obj);
    }
}
 