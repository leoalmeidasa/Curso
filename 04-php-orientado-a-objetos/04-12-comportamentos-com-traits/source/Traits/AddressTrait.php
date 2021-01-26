<?php


namespace Source\Traits;


trait AddressTrait
{
    private $address;

    /**
     * @return mixed
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }


}