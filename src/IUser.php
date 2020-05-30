<?php


namespace App;


interface IUser
{
    public function getID(): int;
    public function getInfo(): string;
}