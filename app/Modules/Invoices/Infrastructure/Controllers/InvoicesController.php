<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\Controllers;

use App\Infrastructure\Controller;
use App\Modules\Invoices\Application\Dtos\InvoiceDto;
use App\Modules\Invoices\Application\InvoiceFacade;
use Ramsey\Uuid\Uuid;

final class InvoicesController extends Controller
{
    public function __construct(
        private readonly InvoiceFacade $invoiceFacade
    ) {
    }

    public function show(string $id): InvoiceDto
    {
        // TODO request input validation
        return $this->invoiceFacade->show(Uuid::fromString($id));
    }
}
