<?php


namespace Source\Traits;


class Register
{
    use AddressTrait;
    use UserTrait;

    public function __construct(User $user, Address $address)
    {
        $this->setUser($user);
        $this->setAddress($address);
        $this->save();
    }

    public function save()
    {
        $this->user->id = 237;
        $this->address->user_id = $this->user->id;
    }
}