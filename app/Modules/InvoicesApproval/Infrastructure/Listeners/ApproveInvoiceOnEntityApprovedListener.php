<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Infrastructure\Listeners;

use App\Modules\Approval\Api\Events\EntityApproved;
use App\Modules\InvoicesApproval\Application\UseCases\ApproveInvoiceUseCase;

final readonly class ApproveInvoiceOnEntityApprovedListener
{
    public function __construct(
      private ApproveInvoiceUseCase $useCase
    ) {
    }

    public function handle(EntityApproved $event): void
    {
        $this->useCase->execute($event->approvalDto->id);
    }
}
