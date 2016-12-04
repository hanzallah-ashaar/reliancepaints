<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTriggerRM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //also have to set reference like RM-1 which will increment automatically
//        journal_entry.id = journal_entry_lines.journal_entry_id AND

        DB::unprepared('
        CREATE TRIGGER add_Amount_RM_Receipt
            AFTER INSERT ON `purchase_receipt` 
            FOR EACH ROW
                BEGIN

                    SET @SEQ = 0;

                    SELECT COALESCE(MAX(CONVERT(SUBSTR(`reference`, 3), INTEGER)), 1)
                    INTO @SEQ
                    FROM `journalentry`
                    WHERE `reference` LIKE `RM-%`;

                    @SEQ = @SEQ + 1;

                    INSERT INTO `journalentry`
                    VALUES(`automatic RM receipt entry`, @SEQ, CONCAT(`RM-`, @SEQ), 1,now());
                    
                    INSERT INTO `journal_entry_lines`
                    VALUES(
                    (SELECT `id` FROM `chart_of_accounts` WHERE `name` = `ACCOUNT PAYABLE`), CONCAT(`RM-`, @SEQ), 
                    `AUTO ENTRY RECEIPT`, now(), NEW.total, 1, `debit`);
                    
                    INSERT INTO `journal_entry_lines`
                    VALUES(
                    (SELECT `id` FROM `chart_of_accounts` WHERE `name` = `PURCHASE`), CONCAT(`RM-`, @SEQ), 
                    `AUTO ENTRY RECEIPT`, now(), NEW.total, 0, `credit`);

                    UPDATE `chart_of_accounts` 
                    SET `total_amount` = (total_amount + NEW.total)
                    WHERE `name` = `Account Payable`;
                    
                    UPDATE `chart_of_accounts` 
                    SET `total_amount` = (total_amount + NEW.total)
                    WHERE `name` = `Purchase`;
                
                END'
        );

        DB::unprepared('
        CREATE TRIGGER add_Amount_RM_Return
            AFTER INSERT ON `purchase_return`
            FOR EACH ROW
                BEGIN     
                
                    SET @SEQ = 0;

                    SELECT COALESCE(MAX(CONVERT(SUBSTR(`reference`, 3), INTEGER)), 1)
                    INTO @SEQ
                    FROM `journalentry`
                    WHERE `reference` LIKE `RM-%`;
               
                    @SEQ = @SEQ + 1;
               
                    INSERT INTO `journalentry`
                    VALUES(`automatic RM return entry`, @SEQ, CONCAT(`RM-`, @SEQ), 1,now());
                    
                    INSERT INTO `journal_entry_lines`
                    VALUES(
                    (SELECT `id` FROM `chart_of_accounts` WHERE `name` = `ACCOUNT PAYABLE`), CONCAT(`RM-`, @SEQ), 
                    `AUTO ENTRY RETURN`, now(), NEW.total, 1, `debit`);
                    
                    INSERT INTO `journal_entry_lines`
                    VALUES(
                    (SELECT `id` FROM `chart_of_accounts` WHERE `name` = `PURCHASE`), CONCAT(`RM-`, @SEQ), 
                    `AUTO ENTRY RETURN`, now(), NEW.total, 0, `credit`);

                    UPDATE `chart_of_accounts` 
                    SET `total_amount` = (total_amount - NEW.total)
                    WHERE `name` = `Account Payable`;
                    
                    UPDATE `chart_of_accounts` 
                    SET `total_amount` = (total_amount - NEW.total)
                    WHERE `name` = `Purchase`;
                    
                END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `add_Amount_RM_Receipt`');
        DB::unprepared('DROP TRIGGER `add_Amount_RM_Return`');
    }
}
