<?php

# Define the common folders we will be using as constants

define('API', '../../api/');
define('LIBRARIES', API.'libraries/');
define('MODELS', API.'models/');
define('CONTROLLERS', API.'controllers/');


# Load all our libraries

// require_once LIBRARIES.'auth.lib.php';
require_once LIBRARIES.'auth.lib.php';
require_once LIBRARIES.'collection.lib.php';
require_once LIBRARIES.'config.lib.php';
require_once LIBRARIES.'database.lib.php';
require_once LIBRARIES.'email.lib.php';
require_once LIBRARIES.'input.lib.php';
require_once LIBRARIES.'model.lib.php';
require_once LIBRARIES.'route.lib.php';
require_once LIBRARIES.'sticky.lib.php';
require_once LIBRARIES.'url.lib.php';
require_once LIBRARIES.'xss.lib.php';

# Load all our models

require_once MODELS.'comment.model.php';
require_once MODELS.'comments.collection.php';
require_once MODELS.'task.model.php';
require_once MODELS.'tasks.collection.php';
require_once MODELS.'list.model.php';
require_once MODELS.'lists.collection.php';
require_once MODELS.'user.model.php';
require_once MODELS.'users.collection.php';

// # Load all our controllers

require_once CONTROLLERS.'commentController.php';
require_once CONTROLLERS.'listController.php';
require_once CONTROLLERS.'taskController.php';
require_once CONTROLLERS.'userController.php';


# load the helpers and the routes

require_once API.'helpers.php';
require_once API.'routes.php';