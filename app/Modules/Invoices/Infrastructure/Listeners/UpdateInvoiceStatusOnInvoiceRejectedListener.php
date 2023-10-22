<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\Listeners;

use App\Domain\Enums\StatusEnum;
use App\Modules\Invoices\Application\Dtos\UpdateInvoiceDto;
use App\Modules\Invoices\Application\InvoiceFacade;
use App\Modules\InvoicesApproval\Api\Events\InvoiceApproved;

final readonly class UpdateInvoiceStatusOnInvoiceRejectedListener
{
    public function __construct(
        private InvoiceFacade $invoiceFacade
    ) {
    }

    public function handle(InvoiceApproved $event): void
    {
        $this->invoiceFacade->update(
            new UpdateInvoiceDto(
                $event->id,
                StatusEnum::REJECTED
            )
        );
    }
}
