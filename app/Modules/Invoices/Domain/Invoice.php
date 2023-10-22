<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain;

use App\Domain\Enums\StatusEnum;
use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;

// TODO Use Doctrine to map this class and its children classes to database tables. Don't forget about optimistic locking.
final class Invoice
{
    private UuidInterface $id;
    private string $invoiceNumber;
    private DateTimeImmutable $date;
    private DateTimeImmutable $dueDate;
    private Company $company;
    private Company $billedCompany;
    /**
     * @var ProductLine[]
     */
    private array $productLines = [];
    private StatusEnum $status = StatusEnum::DRAFT;

    public function __construct(
        UuidInterface $id,
        string $invoiceNumber,
        DateTimeImmutable $date,
        DateTimeImmutable $dueDate,
        Company $company,
        Company $billedCompany,
    ) {
        $this->id = $id;
        $this->invoiceNumber = $invoiceNumber;
        $this->date = $date;
        $this->dueDate = $dueDate;
        $this->company = $company;
        $this->billedCompany = $billedCompany;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(string $invoiceNumber): void
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    public function getDueDate(): DateTimeImmutable
    {
        return $this->dueDate;
    }

    public function setDueDate(DateTimeImmutable $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    public function getBilledCompany(): Company
    {
        return $this->billedCompany;
    }

    public function setBilledCompany(Company $billedCompany): void
    {
        $this->billedCompany = $billedCompany;
    }

    /**
     * @return ProductLine[]
     */
    public function getProductLines(): array
    {
        return $this->productLines;
    }

    public function addProductLine(ProductLine $productLine): void
    {
        $this->productLines[] = $productLine;
    }

    public function getStatus(): StatusEnum
    {
        return $this->status;
    }

    public function setStatus(StatusEnum $status): void
    {
        $this->status = $status;
    }
}
