<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Domain;

enum InvoiceApprovalStatus: string
{
    case INITIALIZED = 'initialized';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}
