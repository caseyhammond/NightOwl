<?php

namespace NightOwl;

return array(
     'controllers' => array(
         'invokables' => array(
             'NightOwl\Controller\AuthRest' => 'NightOwl\Controller\AuthRestController',
             'NightOwl\Controller\LaunchCodes' => 'NightOwl\Controller\LaunchCodesController',
         ),
     ),
     'router' => array(
         'routes' => array(
             'login' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/login[/:id][/:pw]',
                     'constraints' => array(
                         'id' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'pw' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
                     'defaults' => array(
                         'controller' => 'NightOwl\Controller\AuthRest',
                     ),
                 ),
             ),
             'codes' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route' =>  '/codes[/:token][/:dc][/:prefix][/:filterBy][/:filter]',
                     'defaults' => array(
                         'controller' => 'NightOwl\Controller\LaunchCodes',
                     ),
                 ),
            ),
			'createTemp' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route' =>  '/createTemp[/:key]',
                     'defaults' => array(
                         'controller' => 'NightOwl\Controller\LaunchCodes',
                     ),
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
