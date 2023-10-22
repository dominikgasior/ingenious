<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Api\Events;

use Ramsey\Uuid\UuidInterface;

final readonly class InvoiceApproved
{
    public function __construct(public UuidInterface $id)
    {
    }
}
