<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\Providers;

use App\Modules\Invoices\Infrastructure\Listeners\UpdateInvoiceStatusOnInvoiceApprovedListener;
use App\Modules\Invoices\Infrastructure\Listeners\UpdateInvoiceStatusOnInvoiceRejectedListener;
use App\Modules\InvoicesApproval\Api\Events\InvoiceApproved;
use App\Modules\InvoicesApproval\Api\Events\InvoiceRejected;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

final class InvoicesEventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        InvoiceApproved::class => [
            UpdateInvoiceStatusOnInvoiceApprovedListener::class,
        ],
        InvoiceRejected::class => [
            UpdateInvoiceStatusOnInvoiceRejectedListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
