<?php

namespace App\Services;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class DashboardAccess
{
    public const ROLES = [
        'admin' => 'Admin',
        'seller' => 'Seller',
        'agent' => 'Agent',
        'sales' => 'Sales team',
        'verification' => 'Verification team',
        'buyer' => 'Buyer',
    ];

    public function roles(User $user): array
    {
        $names = $user->roles()->pluck('name')->all();

        return array_intersect_key(self::ROLES, array_flip($names));
    }

    public function postLoginRoute(User $user): string
    {
        $roles = $this->roles($user);
        return isset($roles['buyer']) && count($roles) === 1 ? 'index' : 'dashboard';
    }

    public function authorize(User $user, string $role): void
    {
        abort_unless(array_key_exists($role, $this->roles($user)), 403);
    }

    public function properties(User $user, string $role): Builder
    {
        $this->authorize($user, $role);
        $query = Property::query();

        return match ($role) {
            'admin' => $query,
            'seller' => $query->where('owner_id', $user->id),
            'agent' => $query->where('agent_id', $user->id),
            'verification' => $query->whereIn('status', ['submitted', 'under_review', 'approved', 'published']),
            'sales' => $query->where(function (Builder $query) {
                $query->where('status', 'published')->orWhereHas('crmLeads');
            }),
            default => $query->whereRaw('1 = 0'),
        };
    }
}
