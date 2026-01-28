<?php

namespace App\Services;

use App\Models\Access;

class AccessResult
{
    public function __construct(
        public readonly string $status,
        public readonly ?Access $access = null
    ) {}

    public static function noToken(): self
    {
        return new self('no_token');
    }

    public static function invalidService(): self
    {
        return new self('invalid_service');
    }

    public static function invalidToken(): self
    {
        return new self('invalid_token');
    }

    public static function inactive(): self
    {
        return new self('inactive');
    }

    public static function expired(Access $access): self
    {
        return new self('expired', $access);
    }

    public static function valid(Access $access): self
    {
        return new self('valid', $access);
    }

    public function isValid(): bool
    {
        return $this->status === 'valid';
    }
}
