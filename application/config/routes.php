<?php defined('NEGOCORE') or die('No direct script access.');

/**
 * NegoCore
 *
 * @author      Iván Molina Pavana <imp@negocad.mx>
 * @copyright   Copyright (c) 2015, NegoCAD <info@negocad.mx>
 * @version     1.0.0
 */

// --------------------------------------------------------------------------------

/**
 * Default application routes
 *
 * @filesource
 */

/*
 * ------------------------------------------------------------
 * Backend Route
 * ------------------------------------------------------------
 */
    Route::set('backend', BACKEND_DIR_NAME.'(/<controller>(/<action>(/<id>)))')
        ->defaults(array(
            'directory' => 'backend',
            'controller' => 'dashboard',
            'action' => 'index'
        ));

/*
 * ------------------------------------------------------------
 * Default Route
 * ------------------------------------------------------------
 */
    Route::set('default', '(<controller>(/<action>(/<id>)))')
        ->defaults(array(
            'controller' => 'system',
            'action'     => 'default',
        ));
