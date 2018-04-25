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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1justme1');

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
define('AUTH_KEY',         '(W,2,WwCaB:oIsY_0R3PO|Zo3_){V.N<&(}F8&(&[,Lp~&2{D!U&VdleIT/jzN X');
define('SECURE_AUTH_KEY',  'x[L)6fA(u:x(>cZ@wa/3ImQcA;9JLqbQzmaA{fc&ENe8+,Nd^_diN=Tt{G7._y{A');
define('LOGGED_IN_KEY',    '/-x#O2QfJ|9j23h[0S6+s#B>15maUj:Fwvl#.fiKWAXLt2[9PUy&CG7$M@j#)&vC');
define('NONCE_KEY',        'R@7q=1ws`{|mmDI2em!i=@zzhtcM`Eg[eE413Ty[evzj/kllR]r;qc.eTPBxCW[=');
define('AUTH_SALT',        's0pMy>1IUrc2=6WaQK0lSI[52)rSrGeK#FLP~*E^/Yc{!m}WBWa>^N!>&m?6J`*q');
define('SECURE_AUTH_SALT', '178M!QkbgTUt}6[MxK2;;K(I>g)&-V{/!U3iDx_lRPF]nk`D@K)W~t)pU5 0Q1)I');
define('LOGGED_IN_SALT',   'rMaRb$=u|VFxeK(T?XOMYQnWLXvVUt0Y^,`7CA;}$OWqsv+foTPXS|Nf<zJS/FCa');
define('NONCE_SALT',       'o7[)s`_yQ+Ha+x1ML>`Q:/9+Hbk;4w,/HauAWW/yHL)}k}I9sy)en<[*ht[k)}o-');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
