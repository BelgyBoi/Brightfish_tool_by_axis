<?php
// components/config.php

// Check if we're in local development mode
define('IS_DEV_MODE', $_SERVER['REMOTE_ADDR'] === '127.0.0.1');

// Root server path to the Brightfish_tool_by_axis folder
define('ROOT_PATH', __DIR__ . '/');

// Dynamic base URL for href/src
// Get dynamic subfolder path (e.g. /Brightfish_tool_by_axis/)
define('BASE_URL', '/Brightfish_tool_by_axis/');

define('STYLES_URL', BASE_URL . 'stylesheets/');
define('IMAGES_URL', BASE_URL . 'images/');
define('PUBLIC_URL', BASE_URL . 'chatbot/');
define('CHATBOT_PATH', ROOT_PATH . 'chatbot/chatbot.php');
define('COMPONENTS_PATH', ROOT_PATH . 'components/');

