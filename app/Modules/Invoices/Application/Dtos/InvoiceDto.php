<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application\Dtos;

final readonly class InvoiceDto
{
    public function __construct(
        public string $id,
        public string $status
        // TODO all other required properties
    ) {
    }
}
