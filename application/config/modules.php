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
 * Modules to enable
 *
 * All modules must have a different name, no matter which directory they are.
 * That will be overwritten by last in the list.
 *
 * @filesource
 */
return array(
    /*
     * Kohana Core Modules
     */
    'kohana' => array(
        'database' => KH_MODPATH.'database', // Used by ORM
        'orm' => KH_MODPATH.'orm', // All apps will be developed with ORM technique,
    ),

    /*
     * Vendor Modules
     */
    'vendor' => array(
        'twig' => NC_VENPATH.'twig', // Twig Module for views
    ),

    /*
     * NegoCore Modules
     */
    'negocore' => array(
        // Enable NegoCore modules you will need in your application
        // 'module_name' => NC_MODPATH.'module_dir_name'
    ),

    /*
     * Application Modules
     */
    'application' => array(
        // Enable your application modules
        // 'module_name' => MODPATH.'module_dir_name'
    )
);