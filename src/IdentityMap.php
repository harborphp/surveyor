<?php

namespace Surveyor;

use InvalidArgumentException;

/**
 * An IdentityMap, as it states, holds a map of Identities and corresponding
 * DomainObjects.
 *
 * @package Surveyor
 */
class IdentityMap
{
    /**
     * @var array The map of identities => DomainObjects
     */
    protected $map = [];

    /**
     * Adds the given Identity/Object to the Map.
     * @param  mixed        $identity The Identity to add
     * @param  DomainObject $object   The DomainObject to map to the Identity
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function add($identity, DomainObject $object)
    {
        if ($this->contains($identity)) {
            throw new InvalidArgumentException("Identity is not unique: {$identity}");
        }

        $this->map[$identity] = $object;
        return $this;
    }

    /**
     * Gets the DomainObject from the Map.
     * @param  mixed $identity The Identity of the DomainObject
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function get($identity)
    {
        if (! $this->contains($identity)) {
            throw new InvalidArgumentException("Unknown Identity: {$identity}");
        }
        return $this->map[$identity];
    }

    /**
     * Checks if the map contains the given Identity.
     * @param  mixed $identity The Identity of the DomainObject
     * @return bool
     */
    public function contains($identity)
    {
        return array_key_exists($identity, $this->map);
    }
}
