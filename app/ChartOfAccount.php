<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    protected $fillable = [

        'name',
        'type',
        'code',
        'total_amount',
    ];

    public function journalentry(){
        return $this->belongsToMany('App\JournalEntry', 'journal_entry_lines', 'chart_of_accounts_id', 'journalentry_id')
            ->withTimestamps()-> withPivot('journal', 'date_posted', 'amount', 'is_debit', 'label');
    }

}
