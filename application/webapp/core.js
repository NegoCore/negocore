/**
 * WebApp
 *
 * @author      Iván Molina Pavana <imp@negocad.mx>
 * @copyright   Copyright (c) 2015, NegoCAD <info@negocad.mx>
 * @version     1.0.0
 */

// --------------------------------------------------------------------------------

/**
 * Core object with helper functions.
 *
 * @todo Under construction
 */
var Core;
(function (global) {

    Core = {
        // Initial data
        init_data: {},

        /**
         * Initialize init_data
         */
        init: function () {
            this.init_data = WebApp.data;
        },
        /**
         *
         * Redirecto to...
         *
         * @param controller
         * @param action
         * @param id
         */
        redirect: function (controller, action, id) {
            controller = typeof controller != 'undefined' ? controller + '/' : '';
            action = typeof action != 'undefined' ? action + '/' : '';
            id = typeof id != 'undefined' ? id : '';

            backend = this.init_data.is_backend == true ? this.init_data.backend_url : this.init_data.base_url;
            // Redirect
            document.location.href = backend + controller + action + id;
        }
    };

    //
    Core.init();
}(this));