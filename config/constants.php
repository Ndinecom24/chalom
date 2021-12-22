<?php

return [
    'password_change' => 0,
    'password_changed' => 1,

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
        'application' => 1,
        'activated' => 2,
        'pending' => 2,
        'deactivated' => 3,

        'active' =>1,
        'unseen' => 100,
        'seen' => 200,

        'loan_request' => 0 ,
        'loan_request_login' => 4,
        'loan_submission' => 5,
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
