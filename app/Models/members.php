<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = [
        'member_name', 'member_role', 'member_phone',
        'member_email', 'member_address', 'slug', 'nip',
        'biography', 'education', 'research', 'projects',
        'name_variations', 'email_variations', 'phone_variations', 'social_links'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($member) {
            $member->slug = strtolower(str_replace(' ', '-', $member->member_name));
        });

        static::updating(function ($member) {
            $member->slug = strtolower(str_replace(' ', '-', $member->member_name));
        });
    }

    protected $casts = [
        'education' => 'array',
        'research' => 'array',
        'projects' => 'array',
        'name_variations' => 'array',
        'email_variations' => 'array',
        'phone_variations' => 'array',
        'social_links' => 'array',
    ];

    public function archives()
    {
        return $this->hasMany(\App\Models\Archives::class, 'member_id');
    }
}

