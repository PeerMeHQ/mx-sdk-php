<?php

namespace Peerme\Mx;

use Elliptic\EdDSA;
use Peerme\Mx\Interfaces\IVerifiable;

class UserVerifier
{
    public function __construct(
        private string $publicKey,
    ) {
    }

    public static function fromAddress(Address $address): UserVerifier
    {
        return new UserVerifier($address->hex());
    }

    public function verify(IVerifiable $message): bool
    {
        return (new EdDSA('ed25519'))
            ->keyFromPublic($message->address->hex())
            ->verify($message->serializeForSigning(), $message->getSignature()->hex());
    }
}
