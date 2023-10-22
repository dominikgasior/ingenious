<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Application\UseCases;

use App\Modules\InvoicesApproval\Application\UseCases\Exceptions\InvoiceApprovalAlreadyInitializedException;
use App\Modules\InvoicesApproval\Domain\InvoiceApproval;
use Ramsey\Uuid\UuidInterface;

trait InitializeInvoiceApproval
{
    public function initialize(UuidInterface $id): void
    {
        if ($this->invoiceApprovalRepository->has($id)) {
            throw new InvoiceApprovalAlreadyInitializedException();
        }

        $this->invoiceApprovalRepository->save(new InvoiceApproval($id));
    }
}
