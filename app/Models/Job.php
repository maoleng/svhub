<?php

namespace App\Models;

class Job extends Base
{

    protected $fillable = [
        'title', 'slug', 'location', 'type', 'tags', 'salary', 'description', 'size', 'country', 'working_time', 'company_id', 'created_at',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
