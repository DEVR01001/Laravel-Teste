<?php


namespace App\DTO;

use App\ENUMS\SuporteStatus;
use App\Http\Requests\StoreUpdateSupportRequest;

class CreateSuporteDTO
{
    public function __construct(
        public string $subject,
        public SuporteStatus $status,
        public string $body,
    ){ }


    public static function makeFromRequest(StoreUpdateSupportRequest $request): self
    {
        return new self(
            $request->subject,
            SuporteStatus::A,
            $request->body,

        );
    }
}