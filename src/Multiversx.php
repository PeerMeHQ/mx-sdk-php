<?php

namespace Peerme\Mx;

use Peerme\Mx\Address;
use Peerme\Mx\SignableMessage;
use Peerme\Mx\Signature;
use Peerme\Mx\UserVerifier;

class Multiversx
{
    public static function constants(): Constants
    {
        return new Constants;
    }

    public static function verifyLogin(string $token, Signature|string $signature, Address|string $address): bool
    {
        $address = $address instanceof Address ? $address : Address::fromBech32($address);
        $signature = $signature instanceof Signature ? $signature : new Signature($signature);

        $verifiable = new SignableMessage(
            message: "{$address->bech32()}{$token}{}", // how wallet providers sign login messages
            signature: $signature,
            address: $address,
        );

        return UserVerifier::fromAddress($address)
            ->verify($verifiable);
    }
}
