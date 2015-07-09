/**
 * WebApp
 *
 * @author      Iván Molina Pavana <imp@negocad.mx>
 * @copyright   Copyright (c) 2015, NegoCAD <info@negocad.mx>
 * @version     1.0.0
 */

// --------------------------------------------------------------------------------

/**
 * Initialize WebApp
 *
 * This file configures our WebApp, initializes RequireJS & Boot module.
 */

/*
 * ------------------------------------------------------------
 * RequireJS Config
 * ------------------------------------------------------------
 */
    requirejs.config(WebApp.requirejs);

/*
 * ------------------------------------------------------------
 * Execute Boot Module
 * ------------------------------------------------------------
 */
    require(['core/debug'], function (debug) {

        // Array with boot-module
        var module = [WebApp.module];

        // Debug Options
        if (location.search.match('/debug=1/'))
        {
            $('html').addClass('debug');

            window.DEBUG = debug;
            debug.enable(true);
        }

        // Call boot module if exists
        if (module.length > 0 && module[0] != null)
        {
            require(module, function (module_handler) {
                // Initialize module
                module_handler();
            })
        }
        else
        {
            // Init bootstrap module
            require(['webapp/bootstrap'], function (bootstrap) {
                bootstrap();
            });
        }
    });