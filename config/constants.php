<?php

return [
    'password_change' => 0,
    'password_changed' => 1,

    'action' =>[
        'approve' => 'Approved',
        'reject' => 'Rejected',
        'review' => 'Reviewed',
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
    ],

    'status' => [
//        'application' => 1,
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
    ],
];
