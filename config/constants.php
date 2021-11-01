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
            'id' => 1,
            'name' => 'Admin'
        ],
        'developer' => [
            'id' => 2,
            'name' => 'Developer'
        ],
    ],

    'status' => [
        'application' => 1,
        'activated' => 2,
        'pending' => 2,
        'deactivated' => 3
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
    ]
];
