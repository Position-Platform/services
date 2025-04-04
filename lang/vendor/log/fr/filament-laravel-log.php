<?php

return [
    'navigation' => [
        'group' => 'System',
        'label' => 'Logs',
    ],

    'page' => [
        'title' => 'Logs',

        'form' => [
            'placeholder' => 'Sélectionner ou rechercher un fichier journal...',
        ],
    ],

    'actions' => [
        'clear' => [
            'label' => 'Effacer',

            'modal' => [
                'heading' => 'Effacer les journaux du site ?',
                'description' => 'Êtes-vous sûr de vouloir effacer tous les journaux du site ?',

                'actions' => [
                    'confirm' => 'Effacer',
                ],
            ],
        ],

        'jumpToStart' => [
            'label' => 'Vers le Haut',
        ],

        'jumpToEnd' => [
            'label' => 'Vers la fin',
        ],

        'refresh' => [
            'label' => 'Rafraîchir',
        ],
    ],
];
