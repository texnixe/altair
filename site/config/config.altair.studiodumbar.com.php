<?php

// direct access protection
if(!defined('KIRBY')) die('Direct access is not allowed');

/* -----------------------------------------------------------------------------
Cache
--------------------------------------------------------------------------------

*/

c::set('cache', false);


/* -----------------------------------------------------------------------------
Timezone Setup
--------------------------------------------------------------------------------

*/

c::set('timezone', 'UTC');


/* -----------------------------------------------------------------------------
Environment
--------------------------------------------------------------------------------

*/

c::set('environment', 'stage');


/* -----------------------------------------------------------------------------
Troubleshooting
--------------------------------------------------------------------------------

*/

c::set('troubleshoot', false);


/* -----------------------------------------------------------------------------
Debug
--------------------------------------------------------------------------------

*/

c::set('debug', true);


/* -----------------------------------------------------------------------------
Lazyload images
--------------------------------------------------------------------------------

Use `lazyload.init` in main.scripts.js

*/

c::set('lazyload', true);                                                       // Set to true to lazyload images


/* -----------------------------------------------------------------------------
Resrc setup
--------------------------------------------------------------------------------

Use `lazyload.init` in main.scripts.js

*/

c::set('resrc', true);                                                          // set to true to use resrc for retina images


/* -----------------------------------------------------------------------------
Analytics, tracking, site stats
--------------------------------------------------------------------------------

*/

c::set('analytics.tool', false);
