<?php

/**
 * NegoCore
 *
 * @author      Iván Molina Pavana <imp@negocad.mx>
 * @copyright   Copyright (c) 2015, NegoCAD <info@negocad.mx>
 * @version     1.0.0
 */

// --------------------------------------------------------------------------------

/**
 * Index
 *
 * Front controller, configure Kohana & NegoCore to process the request and send
 * a response.
 */

/*
 * ------------------------------------------------------------
 * Main constants
 * ------------------------------------------------------------
 */
    // Set the full path to the docroot
    define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

    // Default extension of resource files
    define('EXT', '.php');

    // Kohana directory
    define('KOHANA', 'kohana'.DIRECTORY_SEPARATOR);

    // NegoCore directory
    define('NEGOCORE', 'negocore'.DIRECTORY_SEPARATOR);

/*
 * ------------------------------------------------------------
 * Set the PHP reporting level
 * ------------------------------------------------------------
 */
    // If you set this in php.ini, you remove this.
    error_reporting(E_ALL | E_STRICT);

/*
 * ------------------------------------------------------------
 * Configure Application directories
 * ------------------------------------------------------------
 */
    // Main application directory
    $application = 'application';

    // Modules are the application identity
    $modules = 'modules';

    // Make the application relative to the docroot, for symlink'd index.php
    if ( ! is_dir($application) && is_dir(DOCROOT.$application))
        $application = DOCROOT.$application;

    // Make the modules relative to the docroot, for symlink'd index.php
    if ( ! is_dir($modules) && is_dir(DOCROOT.$modules))
        $modules = DOCROOT.$modules;

    // Define the absolute paths for configured directories
    define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
    define('MODPATH', realpath($modules).DIRECTORY_SEPARATOR);
    define('SYSPATH', true); // Only for Kohana files validation

/*
 * ------------------------------------------------------------
 * Configure Kohana directories
 * ------------------------------------------------------------
 */

    // Kohana Modules
    $modules = KOHANA.'modules';

    // Kohana System
    $system = KOHANA.'system';

    // Make the modules relative to the docroot, for symlink'd index.php
    if ( ! is_dir($modules) && is_dir(DOCROOT.$modules))
        $modules = DOCROOT.$modules;

    // Make the system relative to the docroot, for symlink'd index.php
    if ( ! is_dir($system) && is_dir(DOCROOT.$system))
        $system = DOCROOT.$system;

    // Define the absolute paths for configured directories
    define('KH_MODPATH', realpath($modules).DIRECTORY_SEPARATOR);
    define('KH_SYSPATH', realpath($system).DIRECTORY_SEPARATOR);

/*
 * ------------------------------------------------------------
 * Configure NegoCore directories
 * ------------------------------------------------------------
 */
    // NegoCore modules are the application identity
    $modules = NEGOCORE.'modules';

    // NegoCore System
    $system = NEGOCORE.'system';

    // Third party modules
    $vendor = NEGOCORE.'vendor';


    // Make the modules relative to the docroot, for symlink'd index.php
    if ( ! is_dir($modules) && is_dir(DOCROOT.$modules))
        $modules = DOCROOT.$modules;

    // Make the vendors relative to the docroot, for symlink'd index.php
    if ( ! is_dir($vendor) && is_dir(DOCROOT.$vendor))
        $vendor = DOCROOT.$vendor;

    // Make the application relative to the docroot, for symlink'd index.php
    if ( ! is_dir($system) && is_dir(DOCROOT.$system))
        $system = DOCROOT.$system;

    // Define the absolute paths for configured directories
    define('NC_MODPATH', realpath($modules).DIRECTORY_SEPARATOR);
    define('NC_SYSPATH', realpath($system).DIRECTORY_SEPARATOR);
    define('NC_VENPATH', realpath($vendor).DIRECTORY_SEPARATOR);

    // Clean up the configuration vars
    unset($application, $modules, $system, $vendor);

/*
 * ------------------------------------------------------------
 * Load installation check
 * ------------------------------------------------------------
 */
    if (file_exists('install'.EXT))
    {
        return include 'install'.EXT;
    }

/*
 * ------------------------------------------------------------
 * Profiling configuration
 * ------------------------------------------------------------
 */
    // Start time of the application
    if ( ! defined('KOHANA_START_TIME'))
    {
        define('KOHANA_START_TIME', microtime(true));
    }

    // Define the memory usage at the start of application
    if ( ! defined('KOHANA_START_MEMORY'))
    {
        define('KOHANA_START_MEMORY', memory_get_usage());
    }

/*
 * ------------------------------------------------------------
 * Bootstrap NegoCore
 * ------------------------------------------------------------
 */
    // Bootstrap the application
    require APPPATH.'bootstrap'.EXT;

/*
 * ------------------------------------------------------------
 * Execute the main request
 * ------------------------------------------------------------
 */
    echo Request::factory(true, array(), false)
        ->execute()
        ->send_headers(true)
        ->body();