<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application\Dtos;

use App\Domain\Enums\StatusEnum;
use Ramsey\Uuid\UuidInterface;

final readonly class UpdateInvoiceDto
{
    public function __construct(
        public UuidInterface $id,
        public StatusEnum $status
    ) {
    }
}
