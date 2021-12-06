<?php

/**
 * PHP 8.1 Readonly Properties
 */

namespace Php81;

require_once __DIR__ . "/../vendor/autoload.php";

class Post
{
    function __construct(
        public readonly string $sender,
        public readonly string $senderAddress,
        public readonly string $recipient,
        public readonly string $recipientAddress,
        public readonly string $body,
    ) {
    }
}

$post = new Post(
    sender: "홍길동",
    senderAddress: "강원도 원주시",
    recipient: "김갑주",
    recipientAddress: "경기도 안산시",
    body: "안녕",
);

// error
// $post->body = "잘가";

dd($post, $post->sender, $post->recipient);
