<?php

namespace Peerme\Mx\Interfaces;

use Peerme\Mx\Signature;

interface ISignable
{
    public function serializeForSigning(): string;

    public function applySignature(Signature $signature): void;
}
