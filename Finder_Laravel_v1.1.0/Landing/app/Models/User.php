<?php

namespace App\Models;
use App\Models\Property;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{

public function hasVerifiedPhone(): bool
{
    $phone = \App\Support\SriLankaMobile::normalize($this->phone);
    return $phone !== null && $this->phone_verified_at !== null && $this->verified_phone === $phone;
}

public function requiresRegistrationVerification(): bool
{
    return $this->registration_verification_pending && !$this->hasVerifiedEmail();
}

public function sendEmailVerificationNotification()
{
    app(\App\Services\EmailVerification::class)->send($this);
}

public function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(AgentSubscription::class, 'agent_id');
}

public function agentApplications(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(AgentApplication::class);
}

public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
{
    return $this->belongsToMany(Role::class)
        ->withTimestamps();
}

public function hasRole(string $role): bool
{
    return $this->roles()
        ->where('roles.name', $role)
        ->exists();
}
public function assignedCrmLeads(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(CrmLead::class, 'assigned_to');
}

public function uploadedPropertyDocuments(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(PropertyDocument::class, 'uploaded_by');
}

public function propertyVerifications(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(PropertyVerification::class, 'reviewer_id');
}

public function ownedProperties(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(Property::class, 'owner_id');
}

public function createdProperties(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(Property::class, 'created_by');
}

public function assignedProperties(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(Property::class, 'agent_id');
}

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'registration_verification_pending' => 'boolean',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'auth_version' => 'integer',
        ];
    }

    public function crmLeadActivities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CrmLeadActivity::class, 'performed_by');
    }

    public function propertyViewings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PropertyViewing::class, 'customer_id');
    }

    public function assignedPropertyViewings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PropertyViewing::class, 'assigned_to');
    }

    public function propertyPurchases(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PropertySale::class, 'buyer_id');
    }

    public function propertySales(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PropertySale::class, 'seller_id');
    }

    public function agentPropertySales(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PropertySale::class, 'agent_id');
    }

    public function profilePhotoUrl(): ?string
    {
        $path = $this->profile_photo_path;
        if (!$path || !preg_match('#^profile-photos/'.$this->id.'/[a-zA-Z0-9_-]+\.(jpg|jpeg|png|webp)$#', $path)) return null;
        return \Illuminate\Support\Facades\Storage::disk('public')->exists($path)
            ? \Illuminate\Support\Facades\Storage::disk('public')->url($path) : null;
    }
}
