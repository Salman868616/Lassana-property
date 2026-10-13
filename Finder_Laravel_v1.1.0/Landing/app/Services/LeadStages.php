<?php

namespace App\Services;

class LeadStages
{
    public const LABELS = [
        'new'=>'New', 'contacted'=>'Contacted', 'interested'=>'Interested',
        'viewing_scheduled'=>'Viewing Scheduled', 'negotiation'=>'Negotiation',
        'converted'=>'Converted', 'closed'=>'Closed',
    ];
    public const OPEN = ['new','contacted','interested','viewing_scheduled','negotiation'];
    public const SOURCES = ['inspection'=>'Inspection request','lgc_service'=>'LGC service request','property_request'=>'Property request','website'=>'Website enquiry','phone'=>'Phone','walk_in'=>'Walk-in',
        'referral'=>'Referral','social_media'=>'Social media','other'=>'Other','unknown'=>'Unknown / legacy'];
    public const OUTCOMES = ['converted'=>'Converted','not_proceeding'=>'Not proceeding',
        'unreachable'=>'Unreachable','duplicate'=>'Duplicate','other'=>'Other'];

    public static function label(?string $status): string
    {
        return self::LABELS[$status] ?? ucfirst(str_replace('_',' ',$status ?? ''));
    }
}
