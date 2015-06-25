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
 * Session
 *
 * Store session settings
 *
 * @filesource
 */
return array(
    // Session type
    'type' => 'native',

    // Native
    'native' => array(
        'name' => 'nc_session',
        'lifetime' => 86400
    )
);