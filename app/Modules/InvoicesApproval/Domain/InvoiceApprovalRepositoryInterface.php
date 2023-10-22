<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Domain;

use Ramsey\Uuid\UuidInterface;

// TODO Adapter
interface InvoiceApprovalRepositoryInterface
{
    public function save(InvoiceApproval $invoiceApproval): bool;

    public function get(UuidInterface $id): InvoiceApproval;

    public function has(UuidInterface $id): bool;
}
