<?php

namespace NightOwl;

return array(
     'controllers' => array(
         'invokables' => array(
             'NightOwl\Controller\AuthRest' => 'NightOwl\Controller\AuthRestController',
             'NightOwl\Controller\LaunchCodes' => 'NightOwl\Controller\LaunchCodesController',
             'NightOwl\Controller\Audit' => 'NightOwl\Controller\AuditController'
         ),
     ),
     'router' => array(
         'routes' => array(
             'login' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/login[/:id][/:pw]',
                     'defaults' => array(
                         'controller' => 'NightOwl\Controller\AuthRest',
                     ),
                 ),
             ),
             'codes' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route' =>  '/codes[/:token][/:seg1][/:seg2][/:seg3][/:seg4]',
                     'defaults' => array(
                         'controller' => 'NightOwl\Controller\LaunchCodes',
                     ),
                 ),
            ),
            'audit' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/audit[/:token][/:query]',
                    'defaults' => array(
                        'controller' => 'NightOwl\Controller\Audit',
                    )
                ),
            ),
         ),
     ),
     'view_manager' => array(
         'strategies' => array(
           'ViewJsonStrategy',
        ),
    ),
);
