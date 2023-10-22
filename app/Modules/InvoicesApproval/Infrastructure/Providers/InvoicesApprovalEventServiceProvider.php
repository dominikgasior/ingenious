<?php

declare(strict_types=1);

namespace App\Modules\InvoicesApproval\Infrastructure\Providers;

use App\Modules\Approval\Api\Events\EntityApproved;
use App\Modules\Approval\Api\Events\EntityRejected;
use App\Modules\InvoicesApproval\Infrastructure\Listeners\ApproveInvoiceOnEntityApprovedListener;
use App\Modules\InvoicesApproval\Infrastructure\Listeners\RejectInvoiceOnEntityRejectedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

final class InvoicesApprovalEventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        EntityApproved::class => [
            ApproveInvoiceOnEntityApprovedListener::class,
        ],
        EntityRejected::class => [
            RejectInvoiceOnEntityRejectedListener::class
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
