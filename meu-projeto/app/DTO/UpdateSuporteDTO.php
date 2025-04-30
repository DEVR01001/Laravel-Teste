<?php


namespace App\DTO;

use App\ENUMS\SuporteStatus;
use App\Http\Requests\StoreUpdateSupportRequest;

class UpdateSuporteDTO 
{
    public function __construct(
        public string $id,
        public string $subject,
        public SuporteStatus $status,
        public string $body,
    ){ }


    public static function makeFromRequest(StoreUpdateSupportRequest $request, string $id = null): self
    {
        return new self(
           $id ?? $request->id,
            $request->subject,
            SuporteStatus::A,
            $request->body,

        );
    }
}