<?php

class AbstractMapperTest extends PHPUnit_Framework_TestCase
{
    public function testCanInstantiate()
    {
        $m = $this->getMockForAbstractClass('Surveyor\AbstractMapper');
        $this->assertInstanceOf('Surveyor\AbstractMapper', $m);
    }
}
 