<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Application\UseCases\Exceptions;

use App\Modules\InvoicesApproval\Application\UseCases\Approve\Exceptions\Throwable;

final class InvoiceApprovalAlreadyInitializedException extends \LogicException
{
    public function __construct(int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct('Invoice approval already in progress', $code, $previous);
    }
}
