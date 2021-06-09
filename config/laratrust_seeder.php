<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'administrateur' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'etudiant-doctorant' => [
            'profile' => 'r,u'
        ],
        'enseignant-chercheur' => [
            'profile' => 'r,u',
        ],
        'chefProjetDeRecherche' => [
            'profile' => 'r,u',
        ],
        'responsableDeFormation' => [
            'profile' => 'r,u',
        ],
        'directeurDeThese' => [
            'profile' => 'r,u',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
