<?php

return [
    'password_change' => 0,
    'password_changed' => 1,

    'action' =>[
        'approve' => 'Approved',
        'reject' => 'Rejected',
        'review' => 'Reviewed',
        'funds_disbursed' => 'Funds Disbursed',
        'loan_payment' => 'Loan Payment',
        'cancel' => 'Cancelled',

    ],

    'role' => [
        'client' => [
            'id' => 1,
            'name' => 'Client'
        ],
        'admin' => [
            'id' => 2,
            'name' => 'Admin'
        ],
        'developer' => [
            'id' => 3,
            'name' => 'Developer'
        ],
        'verifier' => [
            'id' => 4,
            'name' => 'Verifier'
        ],
        'approver' => [
            'id' => 5,
            'name' => 'Approver'
        ],
    ],

    'status' => [
        'application' => 1,
        'active' =>1,
        'activated' => 1,
        'deactivated' => 2,
        'suspended' => 3,

        'loan_request_login' => 4,
        'loan_submission' => 5,
        'loan_reviewed' => 6,
        'loan_approved' => 7,
        'loan_rejected' => 8,
        'loan_paid' => 9,
        'loan_overdue' => 10,
        'loan_cancelled' => 11,

        'seen' => 12,
        'unseen' => 13,

        'loan_funds_disbursed' => 14 ,
        'loan_payment' => 15 ,
    ],
    'work_status' => [
        '1' => 'Student',
        '2' => 'Employed',
        '3' => 'Business',
        '4' => 'Not Working',
        '5' => 'Other'
    ],
    'customer_type' => [
        'new' => 1,
        'returning' => 2,
        'employee' => 4
    ],
    'notifications' => [
        'loan' => 'loan',
    ],
    'types' => [
        'avatar' => 'avatar',
        'nrc' => 'nrc',
        'identity' => 'identity',
        'account_statement' => 'account_statement',
        'payslip' => 'payslip',
        'collateral' => 'collateral',
        'proof_of_payment' => 'proof_of_payment' ,
    ],
];
