<?php
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db_speedymarket2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'm{=+`rKHHTPcCd~#HDWfr~Qbl$jQ,i&4&~<u+OxCUjA)!]!S|b(NWOn0Wpm{.-*U');
define('SECURE_AUTH_KEY',  ']GK0*1n0wl&9FNb$!#TjI:Xo]s/R~L/0dL|J|H9+2:=8?COnQ&t1XOXhA.!T^[|c');
define('LOGGED_IN_KEY',    '{Q Hg43)aY>rMU/`Kd-f8=]OwY;|5<51#gO6M6c-D<XAb81i6{kY5-/X`5`eB@<I');
define('NONCE_KEY',        'CN&M0qtsXsFou/>6ArPlN{^(FQq=|>0xM?04Fo^WUVcdF?0pnL?LLs{(+tu<Ww+b');
define('AUTH_SALT',        '![nknK0rQ0j6l-8G:$0;~b<rPL#Zae@e[5fn7[oo+AS5X+oUsvhEql~mz+62$yZ)');
define('SECURE_AUTH_SALT', 'CiEgp+fEDMNM_Uk*/C!vPM;gggdrIhzWn;{z/v+,ZX%LnfB6aW8=&3  CI>pv&J~');
define('LOGGED_IN_SALT',   '3$Uj|jdNt~GM:PZ+PRtv]~`b`|,GjN5@yLGasL<*B+-q|l.XgG6m*0{+]I.^GTWi');
define('NONCE_SALT',       'FYI*-*/PLjoC=9~]9dBpI9np~~O,J$St^|4`-+h05-/+,-3gYT@$] <cv<8V8K^3');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');