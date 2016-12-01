<?php

return [
    'dot_ems' => [
        'service' => [
            'user' => [
                'atomic_operations' => true,
                'type' => \Dot\Admin\Service\UserService::class,

                'mapper' => [
                    \Dot\Ems\Mapper\RelationalDbMapper::class => [
                        'adapter' => 'database',
                        'table' => 'user',

                        'entity_prototype' => \Dot\Admin\Entity\UserEntity::class,

                        'relations' => [
                            \Dot\Ems\Mapper\Relation\OneToOneRelation::class => [
                                'field_name' => 'details',
                                'ref_name' => 'userId',

                                'mapper' => [
                                    \Dot\Ems\Mapper\DbMapper::class => [
                                        'adapter' => 'database',
                                        'table' => 'user_details',

                                        'identifier_name' => 'userId',
                                        'entity_prototype' => \Dot\Admin\Entity\UserDetailsEntity::class,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],

            'admin' => [
                'atomic_operations' => true,
                'type' => \Dot\Admin\Service\AdminService::class,
                'mapper' => [
                    \Dot\Ems\Mapper\DbMapper::class => [
                        'adapter' => 'database',
                        'table' => 'admin',

                        'entity_prototype' => \Dot\Admin\Entity\AdminEntity::class,
                        'entity_hydrator' => \Dot\Admin\Entity\AdminEntityHydrator::class,
                    ]
                ],
            ],
        ],
    ]
];