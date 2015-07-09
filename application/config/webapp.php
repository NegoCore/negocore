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
 * WebApp configuration
 *
 * @filesource
 */
return array(
    // WebApp Base URL
    'url' => URL::site(), // without last /

    // Assets directories
    'app_path' => 'application', // Application directory
    'mod_path' => 'modules', // Modules directory

    // WebApp Assets
    'js' => array(
        // Required
        array('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js'),
        array('require', '//cdnjs.cloudflare.com/ajax/libs/require.js/2.1.18/require.min.js'),
        array('bootstrap', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js'),

        array('webapp-core', 'webapp/core.js'),
        array('webapp-init', 'webapp/init.js', array('jquery', 'require', 'webapp-core'))
    ),

    // RequireJS Config
    'requirejs' => array(
        'paths' => array(),
        'shim' => array()
    )
);
