<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application\Mappers;

use App\Modules\Invoices\Application\Dtos\InvoiceDto;
use App\Modules\Invoices\Domain\Invoice;

final readonly class InvoiceMapper
{
    public function map(Invoice $invoice): InvoiceDto
    {
        return new InvoiceDto(
            $invoice->getId()->toString(),
            $invoice->getStatus()->value
        );
    }
}
