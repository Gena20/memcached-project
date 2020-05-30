<?php


require __DIR__ . '/vendor/autoload.php';

use App\VKUser;
use App\MemcacheVKUser;

$user = new VKUser('a45fcb084455c2b8771b4f213626247b28c2f807481bc5bd63ca3c6b15844e91522540c0e52a161fbee5c');
$user2 = new MemcacheVKUser($user);

echo $user2->getID().PHP_EOL;
echo $user2->getInfo().PHP_EOL;