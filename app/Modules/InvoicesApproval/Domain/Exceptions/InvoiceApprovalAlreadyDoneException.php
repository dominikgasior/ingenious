<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Domain\Exceptions;

use App\Modules\InvoicesApproval\Application\Throwable;

final class InvoiceApprovalAlreadyDoneException extends \LogicException
{
    public function __construct(int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct('Invoice approval already done', $code, $previous);
    }
}
