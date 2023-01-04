<?php

namespace Peerme\Mx;

class Signature
{
    public function __construct(
        private string $valueHex,
    ) {
    }

    public function hex(): string
    {
        return $this->valueHex;
    }
}
