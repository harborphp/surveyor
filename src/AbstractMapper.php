<?php

namespace Surveyor;

abstract class AbstractMapper
{
    /**
     * Load the given data into a new DomainObject.
     * @param  int   $id   The ID of the data.
     * @param  array $data The data to load
     * @return DomainObject
     */
    abstract protected function createDomainObject($id, array $data);


    /**
     * @var array The identity map.
     */
    protected $identityMap;

    public function __construct()
    {
        $this->identityMap = new IdentityMap();
    }
}
