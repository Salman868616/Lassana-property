<?php
namespace App\Services;

use App\Models\{Property,PropertyViewing,User};
use Carbon\CarbonImmutable;

class ManagementOverview
{
    public function build(User $user): array
    {
        app(DashboardAccess::class)->authorize($user, 'admin');
        $day=CarbonImmutable::now('Asia/Colombo')->startOfDay();
        $properties=Property::query();
        $stages=(clone $properties)->select('status')->selectRaw('COUNT(*) as total')->groupBy('status')->pluck('total','status');
        $verified=(clone $properties)->whereIn('status',['under_review','approved','published'])
            ->whereIn('verification_level',['basic','silver','gold']);
        return [
            'marketing'=>app(MarketingOverview::class)->build(),
            'date'=>$day->format('d M Y'),
            'listings'=>(clone $properties)->count(),
            'newListings'=>(clone $properties)->where('created_at','>=',$day->utc())->where('created_at','<',$day->addDay()->utc())->count(),
            'published'=>(int)($stages['published'] ?? 0),
            'verified'=>(clone $verified)->count(),
            'verificationLevels'=>(clone $verified)->select('verification_level')->selectRaw('COUNT(*) as total')->groupBy('verification_level')->pluck('total','verification_level'),
            'pendingApprovals'=>(int)($stages['submitted'] ?? 0)+(int)($stages['under_review'] ?? 0),
            'readyToPublish'=>(int)($stages['approved'] ?? 0),
            'propertyStatuses'=>$stages,
            'viewings'=>PropertyViewing::count(),
            'viewingStatuses'=>PropertyViewing::select('status')->selectRaw('COUNT(*) as total')->groupBy('status')->pluck('total','status'),
            'upcomingViewings'=>PropertyViewing::where('status','scheduled')->where('scheduled_at','>=',now())->count(),
            'revenue'=>RevenueSummary::totals(),
            'complaints'=>\App\Models\Complaint::select('status')->selectRaw('COUNT(*) as total')->groupBy('status')->pluck('total','status'),
        ];
    }
}
