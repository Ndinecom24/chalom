<?php

namespace App\Http\Livewire\Loans;

use App\Models\Loans\LoanApplications;
use App\Models\Loans\LoanSchedule;
use App\Models\Settings\Status;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Installments extends Component
{

    public $installments = [] ;
    public $statuses = [] ;
    public $state , $status, $search_term , $date_from ,$date_to , $delay  ;

    use WithPagination ;

    public function render()
    {
        $this->statuses = Status::all();
        return view('livewire.loans.installments');
    }

    public function search(){

        $state = $this->search_term ?? "";
        $search_term = $this->search_term ?? "";
        $date_from = $this->date_from ?? "";
        $date_to = $this->date_to ?? "";

        if ($this->status == 0) {

            if ($this->search_term == null) {

                //filter by date
                if (($this->date_from == null) && ($this->date_to == null)) {

                    //get the current year
                    $this->installments = LoanSchedule::whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'))
                        ->orderBy('created_at', 'desc')->take(10)->get();

                } elseif (($this->date_from != null) && ($this->date_to == null)) {
                    $this->installments = LoanSchedule::where('created_at', '>=', $this->date_from)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from == null) && ($this->date_to != null)) {
                    $this->installments = LoanSchedule::where('created_at', '<=', $this->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from != null) && ($this->date_to != null)) {
                    $this->installments = LoanSchedule::where('created_at', '>=', $this->date_from)
                        ->where('created_at', '<=', $this->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } else {
                    //
                }


            }

            else {
                $users = User::where('name', 'like', '%' . $this->search_term . '%')
                    ->orWhere('nid', 'like', '%' . $this->search_term . '%')
                    ->orWhere('mobile_number', 'like', '%' . $this->search_term . '%')
                    ->orWhere('email', 'like', '%' . $this->search_term . '%')
                    ->get();


                //filter by date
                if (($this->date_from == null) && ($this->date_to == null)) {
                    //get the current year
                    $this->installments = LoanSchedule::whereIn('customer_id', $users->pluck('id')->toArray())
                        ->orderBy('created_at', 'desc')->take(10)->get();
                } elseif (($this->date_from != null) && ($this->date_to == null)) {
                    $this->installments = LoanSchedule::whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '>=', $this->date_from)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from == null) && ($this->date_to != null)) {
                    $this->installments = LoanSchedule::whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '<=', $this->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from != null) && ($this->date_to != null)) {
                    $this->installments = LoanSchedule::whereIn('customer_id', $users->pluck('id')->toArray())
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
                    $this->installments = LoanSchedule::where('status', $this->status)
                        ->orderBy('created_at', 'desc')->take(10)->get();
                } elseif (($this->date_from != null) && ($this->date_to == null)) {
                    $this->installments = LoanSchedule::where('status', $this->status)
                        ->where('created_at', '>=', $this->date_from)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from == null) && ($this->date_to != null)) {
                    $this->installments = LoanSchedule::where('status', $this->status)
                        ->where('created_at', '<=', $this->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from != null) && ($this->date_to != null)) {
                    $this->installments = LoanSchedule::where('status', $this->status)
                        ->where('created_at', '>=', $this->date_from)
                        ->where('created_at', '<=', $this->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } else {
                    //
                }
            }


            else {
                $users = User::where('name', 'like', '%' . $this->search_term . '%')->get();
                //filter by date
                if (($this->date_from == null) && ($this->date_to == null)) {
                    //get the current year
                    $this->installments = LoanSchedule::where('status', $this->status)
                        ->whereIn('customer_id', $users->pluck('id')->toArray())
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from != null) && ($this->date_to == null)) {
                    $this->installments = LoanSchedule::where('status', $this->status)
                        ->whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '>=', $this->date_from)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from == null) && ($this->date_to != null)) {
                    $this->installments = LoanSchedule::where('status', $this->status)
                        ->whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '<=', $this->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($this->date_from != null) && ($this->date_to != null)) {
                    $this->installments = LoanSchedule::where('status', $this->status)
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
        $this->installments->load('loan' );


        $this->delay = 'Search Results';


    }


    public function defaulted(){

        $this->installments  = LoanSchedule::whereMonth('date', '<', \Carbon\Carbon::now()->month )
            ->whereYear('date', '<=', \Carbon\Carbon::now()->year )
            ->   where('balance' , '>', 0.001 )
            ->get();

        $this->delay = 'Installments was supposed to be paid before '.date('M Y') ;

    }
    public function dueNextMonth(){

        $this->installments  = LoanSchedule::whereMonth('date', \Carbon\Carbon::now()->month(1))
               ->where('balance' , '>', 0.001 )
            ->get();

        $this->delay = 'Installments due next month '. date('M Y', strtotime('+1 month')) ;

    }
    public function dueThisMonth(){

        $this->installments = LoanSchedule::
            where('balance' , '>', 0.001 )
        ->whereMonth('date', \Carbon\Carbon::now()->month)
            ->get();

        $this->delay = 'Installments due this month '.date('M Y') ;

    }



}
