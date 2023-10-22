<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Application\UseCases;

use App\Domain\Enums\StatusEnum;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Approval\Application\ApprovalFacade;
use App\Modules\InvoicesApproval\Domain\InvoiceApproval;
use App\Modules\InvoicesApproval\Domain\InvoiceApprovalRepositoryInterface;
use Ramsey\Uuid\UuidInterface;

final readonly class InitializeInvoiceApprovalUseCase
{
    use InitializeInvoiceApproval;

    public function __construct(
        private ApprovalFacade $approvalFacade,
        private InvoiceApprovalRepositoryInterface $invoiceApprovalRepository
    ) {
    }

    public function execute(UuidInterface $id): void
    {
        // TODO I'm not sure what the Approval module does but I think these two instructions should be transactional
        $this->initialize($id);

        $this->approvalFacade->approve(
            new ApprovalDto(
                $id,
                StatusEnum::APPROVED,
                InvoiceApproval::class
            )
        );
    }
}
