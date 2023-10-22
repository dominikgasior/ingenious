<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Application;

use App\Modules\InvoicesApproval\Application\UseCases\InitializeInvoiceApprovalUseCase;
use App\Modules\InvoicesApproval\Application\UseCases\InitializeInvoiceRejectionUseCase;
use Ramsey\Uuid\UuidInterface;

final readonly class InvoicesApprovalFacade
{
    // TODO Command Bus could be used here instead injecting every use case
    public function __construct(
        private InitializeInvoiceApprovalUseCase $initializeInvoiceApprovalUseCase,
        private InitializeInvoiceRejectionUseCase $initializeInvoiceRejectionUseCase
    ) {
    }

    public function approve(UuidInterface $id): void
    {
        $this->initializeInvoiceApprovalUseCase->execute($id);
    }

    public function reject(UuidInterface $id): void
    {
        $this->initializeInvoiceRejectionUseCase->execute($id);
    }
}
