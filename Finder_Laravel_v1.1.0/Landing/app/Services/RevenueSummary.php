<?php
namespace App\Services;
use App\Models\RevenuePayment;
use Illuminate\Database\Eloquent\Builder;
class RevenueSummary {
    public static function totals(?Builder $query = null): array {
        $query = $query ? clone $query : RevenuePayment::query();
        $query->whereNull('voided_at');
        return [
            'listing'=>(clone $query)->where('type','listing')->sum('amount'),
            'verification'=>(clone $query)->where('type','verification')->sum('amount'),
            'total'=>(clone $query)->sum('amount'),
        ];
    }
}
