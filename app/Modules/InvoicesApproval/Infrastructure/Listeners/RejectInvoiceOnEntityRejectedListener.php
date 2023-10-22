<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Infrastructure\Listeners;

use App\Modules\Approval\Api\Events\EntityApproved;
use App\Modules\InvoicesApproval\Application\UseCases\RejectInvoiceUseCase;

final readonly class RejectInvoiceOnEntityRejectedListener
{
    public function __construct(
        private RejectInvoiceUseCase $useCase
    ) {
    }

    public function handle(EntityApproved $event): void
    {
        $this->useCase->execute($event->approvalDto->id);
    }
}
