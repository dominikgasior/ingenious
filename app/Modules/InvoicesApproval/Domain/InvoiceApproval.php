<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Domain;

use App\Modules\InvoicesApproval\Domain\Exceptions\InvoiceApprovalAlreadyDoneException;
use Ramsey\Uuid\UuidInterface;

// TODO Use Doctrine to map this class to a database table. Don't forget about optimistic locking.
final class InvoiceApproval
{
    private InvoiceApprovalStatus $status = InvoiceApprovalStatus::INITIALIZED;

    public function __construct(
        public readonly UuidInterface $id,
    ) {
    }

    public function approve(): void
    {
        $this->validate();
        $this->status = InvoiceApprovalStatus::APPROVED;
    }

    public function reject(): void
    {
        $this->validate();
        $this->status = InvoiceApprovalStatus::REJECTED;
    }

    private function validate(): void
    {
        if ($this->status !== InvoiceApprovalStatus::INITIALIZED) {
            throw new InvoiceApprovalAlreadyDoneException();
        }
    }
}
