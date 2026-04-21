<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          ':tL?LPKyuQ#9K6pUD-hg;WcfN!M]pIR_%>g VM9N3J9;YGH,9cYpiS*qntc$TDQ(' );
define( 'SECURE_AUTH_KEY',   '$6lDsnq3,L)f<:L!<<`im4J=.2kIE%J/ci|<KXT{dA0Dl|rlYE:cEIZwciKWT|,F' );
define( 'LOGGED_IN_KEY',     '{S,`^y5^%09HSP2PF!x|[>V1RVTDE$%-.qH)Ifd_>;^A*?sY|.ET{eEDZY{rOwpH' );
define( 'NONCE_KEY',         'u/uK18R$8D9yT1ni.>&o5;|.Dxp .A7sI,mbvTU{7:<0*o~]kpD:^!h(:rb`U4C1' );
define( 'AUTH_SALT',         '>;7kakc_*j:kM`?2/MlI75Z?8ZU-M(CM}~#--~=1Tyh(q{GVM.zLV* :ej|7JZ<4' );
define( 'SECURE_AUTH_SALT',  'PS1(R]^T!mZ|B;GDY3,V[lVQ+W*R $^NmeFyRwFu<c #,lXUJdecoC2MV oy }SH' );
define( 'LOGGED_IN_SALT',    'W*S|,wM+y0:F`jWz$i,D(q4}j]2jj_=%kc]`3puL=%4Ey:K9ENRKvT9@?sK ^0.%' );
define( 'NONCE_SALT',        'Y_~B4P}dWT]thp;t(8`T&8$Z c82:xf;3up0nqr$l%aD,$lJ/hR7)hE] @9G,yf;' );
define( 'WP_CACHE_KEY_SALT', 'WSx,w{2=>5F: bA471BT1?5)-YAE(ph7qs;<^gv&7^I/vZ=;081^fyK,`f(wT){q' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
