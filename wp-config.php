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
define('DB_NAME', 'wp_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'Y^||4#mUI8?xId,vbVGgAHW$D%4G(AMK#`.$N!6CO}6Y>Fny:oDx_Ii{UNqIfS3t');
define('SECURE_AUTH_KEY',  '^|%J>]<_u-rDx<Lr*4pGkGfnoF}26-HIicTD;EyK-m@hBUslr9e&[[+1u6$Y p$8');
define('LOGGED_IN_KEY',    'mqJu&E./I&kBMG]O_+{2Xn9z;_SWw}VP*%9>J.r:(ZKJKUIXqSP$XDZwnn!esb/B');
define('NONCE_KEY',        '&P-qfRCVPr6NrO|YB+xgrU4bT*4h!jrXdm-*(G4I/$~|:Fnn21FMctvY5 5& Vf3');
define('AUTH_SALT',        '=kpp<%7<+X*FV `FzQzrtuDo.v+2$t/LvDM=E) ~qu!:Rkf(xOr&~5cFrFj)/f29');
define('SECURE_AUTH_SALT', '81&*8-NA-(my>c^]L/j-/]~6c]x@v<=AwiL|JF1fhO7[|Qlwue5I4DN_5z3^KZ,-');
define('LOGGED_IN_SALT',   'k+pY#*hGe4+:L%;[~m|MsG~x},Mau}8O$)g`0kcf-(D>^jnH5Uzbn/}+z;(P2v;7');
define('NONCE_SALT',       'f9.#M<h6N 8U+37FPwIVKp. l<XSc]-7NQf|%oT;O 8^@Ta,951H.@5d@[viJ{`8');

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
