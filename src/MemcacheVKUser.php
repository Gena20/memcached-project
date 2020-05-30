<?php


namespace App;


class MemcacheVKUser implements IUser
{
    protected VKUser $VKUser;
    protected int $id;

    public function __construct(VKUser $VKUser)
    {
        $this->VKUser = $VKUser;
    }

    public function getID(): int
    {
        if (!isset($this->id))
            $this->id = $this->VKUser->getID();
        return $this->id;
    }

    public function getInfo(): string
    {
        if (!MemcacheServer::getConn()->get($this->getID()))
            MemcacheServer::getConn()->set($this->getID(), $this->VKUser->getInfo());
        return MemcacheServer::getConn()->get($this->getID());
    }
}