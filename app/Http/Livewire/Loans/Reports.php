<?php

namespace App\Http\Livewire\Loans;

use App\Models\Loans\LoanApplications;
use App\Models\Loans\LoanSchedule;
use App\Models\Settings\Status;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Reports extends Component
{
    public $loans = [];
    public $statuses = [];
    public $state, $status, $search_term, $date_from, $date_to;

    use WithPagination;

    protected $listeners = ['search' => 'search', 'defaulted' => 'defaulted', 'dueNextMonth' => 'dueNextMonth', 'dueThisMonth'=>'dueThisMonth'];


    public function render()
    {
        $this->statuses = Status::all();
        return view('livewire.loans.reports');
    }


    public function search()
    {

        $state = $this->search_term ?? "";
        $search_term = $this->search_term ?? "";
        $date_from = $this->date_from ?? "";
        $date_to = $this->date_to ?? "";

        if ($this->status == 0) {

            if ($this->search_term == null) {

                //filter by date
                if (($this->date_from == null) && ($this->date_to == null)) {
                    //get the current year
                    $this->loans = LoanApplications::whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'))
                        ->whereNotIn('statuses_id', [
                            config('constants.status.loan_rejected'),
                            config('constants.status.loan_cancelled'),
                            config('constants.status.loan_submission'),
                            config('constants.status.loan_reviewed'),
                            config('constants.status.loan_request_login'),
                        ] )
                        ->orderBy('created_at', 'desc')->take(10)->get();
                } elseif (($this->date_from != null) && ($this->date_to == null)) {
                    $this->loans = LoanApplications::where('created_at', '>=', $this->date_from)
                        ->whereNotIn('statuses_id', [
                            config('constants.status.loan_rejected'),
                            config('constants.status.loan_cancelled'),
                            config('constants.status.loan_submission'),
                            config('constants.status.loan_reviewed'),
                            config('constants.status.loan_request_login'),
                        ] )
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from == null) && ($this->date_to != null)) {
                    $this->loans = LoanApplications::where('created_at', '<=', $this->date_to)
                        ->whereNotIn('statuses_id', [
                            config('constants.status.loan_rejected'),
                            config('constants.status.loan_cancelled'),
                            config('constants.status.loan_submission'),
                            config('constants.status.loan_reviewed'),
                            config('constants.status.loan_request_login'),
                        ] )
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from != null) && ($this->date_to != null)) {
                    $this->loans = LoanApplications::where('created_at', '>=', $this->date_from)
                        ->where('created_at', '<=', $this->date_to)
                        ->whereNotIn('statuses_id', [
                            config('constants.status.loan_rejected'),
                            config('constants.status.loan_cancelled'),
                            config('constants.status.loan_submission'),
                            config('constants.status.loan_reviewed'),
                            config('constants.status.loan_request_login'),
                        ] )
                        ->orderBy('created_at', 'desc')->get();
                } else {
                    //
                }


            } else {
                $users = User::where('name', 'like', '%' . $this->search_term . '%')
                    ->orWhere('nid', 'like', '%' . $this->search_term . '%')
                    ->orWhere('mobile_number', 'like', '%' . $this->search_term . '%')
                    ->orWhere('email', 'like', '%' . $this->search_term . '%')
                    ->get();


                //filter by date
                if (($this->date_from == null) && ($this->date_to == null)) {
                    //get the current year
                    $this->loans = LoanApplications::whereIn('customer_id', $users->pluck('id')->toArray())
                        ->whereNotIn('statuses_id', [
                            config('constants.status.loan_rejected'),
                            config('constants.status.loan_cancelled'),
                            config('constants.status.loan_submission'),
                            config('constants.status.loan_reviewed'),
                            config('constants.status.loan_request_login'),
                        ] )
                        ->orderBy('created_at', 'desc')->take(10)->get();
                } elseif (($this->date_from != null) && ($this->date_to == null)) {
                    $this->loans = LoanApplications::whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '>=', $this->date_from)
                        ->whereNotIn('statuses_id', [
                            config('constants.status.loan_rejected'),
                            config('constants.status.loan_cancelled'),
                            config('constants.status.loan_submission'),
                            config('constants.status.loan_reviewed'),
                            config('constants.status.loan_request_login'),
                        ] )
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from == null) && ($this->date_to != null)) {
                    $this->loans = LoanApplications::whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '<=', $this->date_to)
                        ->whereNotIn('statuses_id', [
                            config('constants.status.loan_rejected'),
                            config('constants.status.loan_cancelled'),
                            config('constants.status.loan_submission'),
                            config('constants.status.loan_reviewed'),
                            config('constants.status.loan_request_login'),
                        ] )
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from != null) && ($this->date_to != null)) {
                    $this->loans = LoanApplications::whereIn('customer_id', $users->pluck('id')->toArray())
                        ->whereNotIn('statuses_id', [
                            config('constants.status.loan_rejected'),
                            config('constants.status.loan_cancelled'),
                            config('constants.status.loan_submission'),
                            config('constants.status.loan_reviewed'),
                            config('constants.status.loan_request_login'),
                        ] )
                        ->where('created_at', '>=', $this->date_from)
                        ->where('created_at', '<=', $this->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } else {
                    //
                }
            }
        } else {
            $state = Status::find($this->status);
            if ($this->search_term == null) {

                //filter by date
                if (($this->date_from == null) && ($this->date_to == null)) {
                    //get the current year
                    $this->loans = LoanApplications::where('statuses_id', $this->status)
                        ->orderBy('created_at', 'desc')->take(10)->get();
                } elseif (($this->date_from != null) && ($this->date_to == null)) {
                    $this->loans = LoanApplications::where('statuses_id', $this->status)
                        ->where('created_at', '>=', $this->date_from)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from == null) && ($this->date_to != null)) {
                    $this->loans = LoanApplications::where('statuses_id', $this->status)
                        ->where('created_at', '<=', $this->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from != null) && ($this->date_to != null)) {
                    $this->loans = LoanApplications::where('statuses_id', $this->status)
                        ->where('created_at', '>=', $this->date_from)
                        ->where('created_at', '<=', $this->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } else {
                    //
                }

            } else {
                $users = User::where('name', 'like', '%' . $this->search_term . '%')->get();

                //filter by date
                if (($this->date_from == null) && ($this->date_to == null)) {
                    //get the current year
                    $this->loans = LoanApplications::where('statuses_id', $this->status)
                        ->whereIn('customer_id', $users->pluck('id')->toArray())
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from != null) && ($this->date_to == null)) {
                    $this->loans = LoanApplications::where('statuses_id', $this->status)
                        ->whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '>=', $this->date_from)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from == null) && ($this->date_to != null)) {
                    $this->loans = LoanApplications::where('statuses_id', $this->status)
                        ->whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '<=', $this->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from != null) && ($this->date_to != null)) {
                    $this->loans = LoanApplications::where('statuses_id', $this->status)
                        ->whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '>=', $this->date_from)
                        ->where('created_at', '<=', $this->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } else {
                    //
                }

            }
        }

//search_term
        $this->loans->load('loan', 'schedules');
        $this->dispatchBrowserEvent('contentChanged');


    }

    public function defaulted()
    {

        $due_schedules = LoanSchedule::whereMonth('date', '<', Carbon::now()->month)
            ->whereIn('status',
                [
                    config('constants.status.loan_funds_disbursed'),
                    config('constants.status.loan_payment'),
                ])
            ->get();
        $this->loans = LoanApplications::whereIn('id', $due_schedules->pluck('loan_applications_id')->toArray())
            ->whereIn('statuses_id',
                [
                    config('constants.status.loan_funds_disbursed'),
                    config('constants.status.loan_payment'),
                ])
            ->orderBy('created_at', 'desc')->get();
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function dueNextMonth()
    {

        $due_schedules = LoanSchedule::whereMonth('date', Carbon::now()->month(1))
            ->whereIn('status',
                [
                    config('constants.status.loan_funds_disbursed'),
                    config('constants.status.loan_payment'),
                ])
            ->get();


        $this->loans = LoanApplications::whereIn('id', $due_schedules->pluck('loan_applications_id')->toArray())
            ->whereIn('statuses_id',
                [
                    config('constants.status.loan_funds_disbursed'),
                    config('constants.status.loan_payment'),
                ])
            ->orderBy('created_at', 'desc')->get();
        $this->dispatchBrowserEvent('contentChanged');

    }

    public function dueThisMonth()
    {
        $due_schedules = LoanSchedule::whereMonth('date', Carbon::now()->month)
            ->whereIn('status',
                [
                    config('constants.status.loan_funds_disbursed'),
                    config('constants.status.loan_payment'),
                ])
            ->get();


        $this->loans = LoanApplications::whereIn('id', $due_schedules->pluck('loan_applications_id')->toArray())
            ->whereIn('statuses_id',
                [
                    config('constants.status.loan_funds_disbursed'),
                    config('constants.status.loan_payment'),
                ])
            ->orderBy('created_at', 'desc')->get();
        $this->dispatchBrowserEvent('contentChanged');

    }

}
