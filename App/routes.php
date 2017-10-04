<?php
/**
 * You must use just lowercase !!!
 */
return [
    'post' => [
        '/login' => 'SecurityController@login',
        '/create' => 'TaskController@taskAdd',
        '/logout' => [
            'controller' => 'SecurityController@logout',
            'secured' => true
        ],
        '/task/edit' => [
            'controller' => 'AdminController@saveTask',
            'secured' => true
        ],
        '/task-details' => 'TaskController@taskDetail'
    ],
    'get' => [
        '/' => 'TaskController@taskList',
        '/create' => 'TaskController@taskCreate',
        '/login' => 'LoginController@showLoginForm',
        '/admin' => [
            'controller' => 'AdminController@taskList',
            'secured' => true
        ],
        '/task/edit' => [
            'controller' => 'AdminController@editTask',
            'secured' => true
        ]
    ]
];