<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Application\UseCases;

use App\Modules\InvoicesApproval\Api\Events\InvoiceRejected;
use App\Modules\InvoicesApproval\Domain\InvoiceApprovalRepositoryInterface;
use Illuminate\Contracts\Events\Dispatcher;
use Ramsey\Uuid\UuidInterface;

final readonly class RejectInvoiceUseCase
{
    public function __construct(
        private InvoiceApprovalRepositoryInterface $invoiceApprovalRepository,
        private Dispatcher $dispatcher
    ) {
    }

    public function execute(UuidInterface $id): void
    {
        $invoiceApproval = $this->invoiceApprovalRepository->get($id);

        $invoiceApproval->reject();

        $this->invoiceApprovalRepository->save($invoiceApproval);

        $this->dispatcher->dispatch(new InvoiceRejected($id));
    }
}
