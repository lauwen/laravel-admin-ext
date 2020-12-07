<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CgSummary extends Model
{
    protected $table = "cg_summarys";
    public function detail () {
        return $this->hasMany(\App\Models\CgSummaryDetail::class, 'summary_id');
    }
}
