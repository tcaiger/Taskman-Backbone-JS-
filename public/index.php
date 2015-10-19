<?php

# Define the common folders we will be using as constants

define('API', '../api/');

define('LIBRARIES', API.'libraries/');

define('APP', 'app/');
define('VIEWS', 'views/');
define('CONTROLLERS', 'controllers/');
define('MODELS', 'models/');
define('ASSETS', 'assets/');
define('TEMPLATES', ASSETS.'templates/');

# Load all our libraries

require_once LIBRARIES.'auth.lib.php';
require_once LIBRARIES.'config.lib.php';
require_once LIBRARIES.'database.lib.php';
require_once LIBRARIES.'form.lib.php';
require_once LIBRARIES.'input.lib.php';
require_once LIBRARIES.'model.lib.php';
require_once LIBRARIES.'route.lib.php';
require_once LIBRARIES.'upload.lib.php';
require_once LIBRARIES.'url.lib.php';

require_once MODELS.'user.model.php';

# load the helpers and the routes

require_once 'routes.php';

