<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application;

use App\Modules\Invoices\Application\Dtos\InvoiceDto;
use App\Modules\Invoices\Application\Dtos\UpdateInvoiceDto;
use App\Modules\Invoices\Application\Mappers\InvoiceMapper;
use App\Modules\Invoices\Domain\InvoiceRepositoryInterface;
use Ramsey\Uuid\UuidInterface;

final readonly class InvoiceFacade
{
    public function __construct(
        private InvoiceRepositoryInterface $invoiceRepository,
        private InvoiceMapper $invoiceMapper
    ) {
    }

    public function show(UuidInterface $id): InvoiceDto
    {
        $invoice = $this->invoiceRepository->get($id);

        return $this->invoiceMapper->map($invoice);
    }

    public function update(UpdateInvoiceDto $dto): void
    {
        $invoice = $this->invoiceRepository->get($dto->id);

        $invoice->setStatus($dto->status);

        $this->invoiceRepository->save($invoice);
    }
}
