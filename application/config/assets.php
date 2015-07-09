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
 * Assets configuration
 *
 * @filesource
 */
return array(
    // Assets Base URL
    'url' => URL::site(), // without last /

    // Assets directories
    'app_path' => 'application', // Application assets directory
    'mod_path' => 'modules', // Modules directory
);