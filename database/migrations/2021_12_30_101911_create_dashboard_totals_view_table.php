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

            count(id)  as users ,
            (SELECT count(id) as total FROM `users` WHERE customer_type_id = '4' AND deleted_at is null) as employees ,
            (SELECT count(id) as total FROM `users` WHERE customer_type_id = '2' AND deleted_at is null) as return_customers ,
            (SELECT count(id) as total FROM `users` WHERE customer_type_id = '1' AND deleted_at is null ) as new_customers ,

            (SELECT count(id) as total FROM `loan_applications` WHERE statuses_id = '9'  ) as paid_loans ,
            (SELECT sum(loan_amount) as total FROM `loan_applications` WHERE statuses_id = '9'  ) as paid_loans_amount ,
            (SELECT sum(loan_amount_due) as total FROM `loan_applications` WHERE statuses_id = '9'  ) as paid_loans_amount_due ,

            (SELECT count(id) as total FROM `loan_applications` WHERE statuses_id  IN ('2' ,'8', '11')  ) as rejected_loans ,
            (SELECT sum(loan_amount) as total FROM `loan_applications` WHERE statuses_id  IN  ('2' ,'8', '11')  ) as rejected_loans_amount ,
            (SELECT sum(loan_amount_due) as total FROM `loan_applications` WHERE statuses_id   IN  ('2' ,'8', '11')  ) as rejected_loans_amount_due ,

            (SELECT count(id) as total FROM `loan_applications` WHERE statuses_id  IN ('5' ,'6', '7')  ) as pending_loans ,
            (SELECT sum(loan_amount) as total FROM `loan_applications` WHERE statuses_id  IN ('5' ,'6', '7')  ) as pending_loans_amount ,
            (SELECT sum(loan_amount_due) as total FROM `loan_applications` WHERE statuses_id   IN ('5' ,'6', '7')  ) as pending_loans_amount_due ,

            (SELECT count(id) as total FROM `loan_applications` WHERE statuses_id IN ('10' ,'14', '15')  ) as active_loans,
            (SELECT sum(loan_amount) as total FROM `loan_applications` WHERE statuses_id  IN ('10' ,'14', '15')  ) as active_loans_amount,
            (SELECT sum(loan_amount_due) as total FROM `loan_applications` WHERE statuses_id  IN ('10' ,'14', '15')  ) as active_loans_amount_due

            FROM `users` WHERE deleted_at is null

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
