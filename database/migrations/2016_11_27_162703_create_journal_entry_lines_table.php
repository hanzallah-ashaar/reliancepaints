<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalEntryLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_entry_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chart_of_accounts_id')->unsigned();
            $table->foreign('chart_of_accounts_id')->references('id')->on('chart_of_accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('journalentry_id')->unsigned();
            $table->foreign('journalentry_id')->references('id')->on('journalentry')->onUpdate('cascade')->onDelete('cascade');
            $table->string('journal');
            $table->date('date_posted');
            $table->decimal('amount',12,2);
            $table->boolean('is_debit');
            $table->string('label');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journal_entry_lines');
    }
}
