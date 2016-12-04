<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{

    protected $table = 'journalentry';

    protected $fillable = [
        'reference',
        'partner',
        'name',
        'date',
        'is_posted',
    ];


    public function chartofaccounts(){
        return $this->belongsToMany('App\ChartOfAccount', 'journal_entry_lines', 'journalentry_id', 'chart_of_accounts_id')
            ->withTimestamps() -> withPivot('journal', 'date_posted', 'amount', 'is_debit', 'label');
    }
}
