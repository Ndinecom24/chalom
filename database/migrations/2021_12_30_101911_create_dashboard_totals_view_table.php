<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDashboardTotalsViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW dashboard_totals_view AS
        (
           SELECT

            count(id) as borrowers,
            (SELECT sum(loan_amount) as total FROM `loan_applications` WHERE statuses_id = '4') as total_paid ,
            (SELECT count(id) as total FROM `loan_applications` WHERE statuses_id = '4') as pending_loans ,
            (SELECT sum(loan_amount) as total FROM `loan_applications` WHERE statuses_id = '4') as pending_loans_amount ,
            (SELECT count(id) as total FROM `loan_applications` WHERE statuses_id = '5' or  statuses_id = '6'  ) as active_loans,
            (SELECT sum(loan_amount) as total FROM `loan_applications` WHERE statuses_id = '5' or  statuses_id = '6'  ) as active_loans_amount

            FROM `users` WHERE role_id = '1'

        )
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW dashboard_totals_view");
    }
}
