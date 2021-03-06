<?php
namespace PSFS;

if (defined('PSFS_BOOTSTRAP_LOADED')) return;

if (!defined('SOURCE_DIR')) define('SOURCE_DIR', __DIR__);
if (preg_match('/vendor/', SOURCE_DIR)) {
    if (!defined('BASE_DIR')) define('BASE_DIR', SOURCE_DIR . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..');
    if (!defined('CORE_DIR')) define('CORE_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'src');
} else {
    if (!defined('BASE_DIR')) define('BASE_DIR', SOURCE_DIR . DIRECTORY_SEPARATOR . '..');
    if (!defined('CORE_DIR')) define('CORE_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'modules');
}
if (!defined('VENDOR_DIR')) define('VENDOR_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'vendor');
if (!defined('LOG_DIR')) define('LOG_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'logs');
if (!defined('CACHE_DIR')) define('CACHE_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'cache');
if (!defined('CONFIG_DIR')) define('CONFIG_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'config');
if (!defined('WEB_DIR')) define('WEB_DIR', BASE_DIR . DIRECTORY_SEPARATOR . 'html');

defined('PSFS_BOOTSTRAP_LOADED') or define('PSFS_BOOTSTRAP_LOADED', true);

/**
 * Class Bootstrap
 * @package PSFS
 */
class bootstrap {
    public static function load() {
        \PSFS\base\Logger::log('Bootstrap initialized', LOG_INFO);
    }
}
require_once 'functions.php';