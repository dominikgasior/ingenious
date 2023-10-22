<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Infrastructure\Controllers;

use App\Infrastructure\Controller;
use App\Modules\InvoicesApproval\Application\InvoicesApprovalFacade;
use Ramsey\Uuid\Uuid;

final class InvoicesApprovalController extends Controller
{
    public function __construct(
        private readonly InvoicesApprovalFacade $invoicesApprovalFacade
    ) {
    }

    public function approve(string $id): void
    {
        // TODO request input validation
        $this->invoicesApprovalFacade->approve(Uuid::fromString($id));
    }

    public function reject(string $id): void
    {
        // TODO request input validation
        $this->invoicesApprovalFacade->reject(Uuid::fromString($id));
    }
}
