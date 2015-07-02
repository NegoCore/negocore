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
 * Bootstrap
 *
 * Bootstrap the Kohana Framework & NegoCore Application
 */

/*
 * ------------------------------------------------------------
 * Load the Core class
 * ------------------------------------------------------------
 */
    // Load the core Kohana class
    require KH_SYSPATH.'classes/Kohana/Core'.EXT;

    // Load the overwrite NegoCore class
    require NC_SYSPATH.'classes/NegoCore/Kohana'.EXT;

    // NegoCore extends the core
    require NC_SYSPATH.'classes/Kohana'.EXT;

    // I18n required in case of System errors
    require KH_SYSPATH.'classes/Kohana/I18n'.EXT;

/*
 * ------------------------------------------------------------
 * Configure auto-loader
 * ------------------------------------------------------------
 */
    // Enable the auto-loader
    spl_autoload_register(array('Kohana', 'auto_load'));

    // Enable the Kohana auto-loader for unserialization.
    ini_set('unserialize_callback_func', 'spl_autoload_call');

/*
 * ------------------------------------------------------------
 * Configure extras
 * ------------------------------------------------------------
 */
    // Replace the default protocol
    if (isset($_SERVER['SERVER_PROTOCOL']))
    {
        HTTP::$protocol = $_SERVER['SERVER_PROTOCOL'];
    }

    // Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
    if (isset($_SERVER['KOHANA_ENV']))
    {
        Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
    }

/*
 * ------------------------------------------------------------
 * Initialize Core, setting the default options.
 * ------------------------------------------------------------
 */
    Kohana::init(array(
        'base_url'				=> '/',
        'index_file'			=> false,
        'cache_dir'				=> APPPATH.'cache',
        'caching'				=> Kohana::$environment < Kohana::DEVELOPMENT,
        'profile'				=> Kohana::$environment > Kohana::PRODUCTION,
        'errors'				=> true
    ));

/*
 * ------------------------------------------------------------
 * Config
 * ------------------------------------------------------------
 */
    // Attach a file reader to config. Multiple readers are supported.
    Kohana::$config->attach(new Config_File);
/*
 * ------------------------------------------------------------
 * Configure regional settings
 * ------------------------------------------------------------
 */
    // Set default time zone
    date_default_timezone_set(Kohana::$config->load('locale.timezone'));

    // Set the mb_substitute_character to "none"
    mb_substitute_character('none');

    // Set default locale
    setlocale(LC_ALL, Kohana::$config->load('locale.locale'));

    // Set default language
    I18n::lang(Kohana::$config->load('locale.language'));

/*
 * ------------------------------------------------------------
 * Logs
 * ------------------------------------------------------------
 */
    // Attach the file write to logging. Multiple writers are supported.
    Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/*
 * ------------------------------------------------------------
 * Cookies & Session
 * ------------------------------------------------------------
 */
    // Set cookie salt
    Cookie::$salt = Kohana::$config->load('cookie.salt');

    // Set default session type
    Session::$default = Kohana::$config->load('session.type');

/*
 * ------------------------------------------------------------
 * Backend Directory
 * ------------------------------------------------------------
 */
    // Define it here allows access from routes & modules
    define('BACKEND_DIR_NAME', 'backend');

/*
 * ------------------------------------------------------------
 * Load default routes
 * ------------------------------------------------------------
 */
    require APPPATH.'config'.DIRECTORY_SEPARATOR.'routes'.EXT;

/*
 * ------------------------------------------------------------
 * Load Modules
 * ------------------------------------------------------------
 */
    // Load all modules from config file
    Kohana::modules(Kohana::$config->load('modules')->as_array());