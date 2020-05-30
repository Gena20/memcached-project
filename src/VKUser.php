<?php


namespace App;


class VKUser implements IUser
{
    protected string $token;


    public function __construct(string $token)
    {
        $this->token = $token;
    }


    public function getID(): int
    {
        $res = json_decode(file_get_contents("https://api.vk.com/method/users.get?v=5.107&access_token=$this->token"), true);
        if (isset($res['error']))
            throw new \RuntimeException(json_encode($res['error']));
        return $res['response'][0]['id'];
    }

    public function getInfo(): string
    {
        $res = json_decode(file_get_contents("https://api.vk.com/method/users.get?fields=bdate&v=5.107&access_token=$this->token"), true);
        if (isset($res['error']))
            throw new \RuntimeException(json_encode($res['error']));
        return serialize($res['response'][0]);
    }
}