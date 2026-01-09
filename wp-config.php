<?php

define( 'WP_CACHE', true ); // Added by WP Rocket




 // Added by WP Rocket


/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u444867886_mohsen');

/** MySQL database username */
define('DB_USER', 'u444867886_mohsen');

/** MySQL database password */
define('DB_PASSWORD', 'Ic:2gNh]8@');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'f1998ea0116d4214567d33ec7a8e9635f5c858e46633af8d2fdadab37042460b');
define('SECURE_AUTH_KEY', 'adf9300fd8d4c990299d323b8b90ffaa6f50bc79462ab6e45ca71ff31e59159f');
define('LOGGED_IN_KEY', '6f0f33c1f2a02baa0cdfc7974e29740f7903900e2ac7169170dcca25a57ff79e');
define('NONCE_KEY', '6957b4743bce1e538dafa25ef0be7fe052bfc9c20211f0db8bd989af3a9a9e74');
define('AUTH_SALT', 'a9ce68819e06d6e3dc540355fe16213a30c8ee5920b2c5efa13a64e5b732fcd8');
define('SECURE_AUTH_SALT', '9b11cb546eb0846abd57983596754036e1d0dc4e4f9c8afb36817f4650ff4996');
define('LOGGED_IN_SALT', '2ca45c6a385618243d4d32c3baf4678f652131a1c60e475ba092df8c4dd5d833');
define('NONCE_SALT', '248da25641a4e3116a81538e36933c16ccda55507f7cae13d9bbc0d3e2644b82');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Jul_';

define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */

define( 'WP_DEBUG', false );

define( 'FS_METHOD', 'direct' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
