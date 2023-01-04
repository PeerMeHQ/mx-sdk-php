<?php

namespace Peerme\Mx\Interfaces;

use Peerme\Mx\Signature;

interface IVerifiable
{
    public function serializeForSigning(): string;

    public function getSignature(): Signature;
}
