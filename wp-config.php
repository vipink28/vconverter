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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vconverterdb' );

/** MySQL database username */
define( 'DB_USER', 'vconverteruser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'bikesM, ;,wNy0#3|YdI._f?[j:v!&7L0Y&>Cv9mJ]Qo}n4K5XG[7GoB^ZMobk>c' );
define( 'SECURE_AUTH_KEY',  'RA$NZn4U3&/#FIS|7>9A;[V-QUE0+EhOg_LGy^!V=Nfn:$|a`DU[=Oy/`{)|Vc4}' );
define( 'LOGGED_IN_KEY',    'a{lM6Q^V;q^o2]9b7FoT2!x!DOQKfEiQRp)s+n9A3:pgo~v8tu%<AX9ZobM:#|jC' );
define( 'NONCE_KEY',        'I_] D1>qUYZx H2|=^o=n3Nvd%fsf;aOf&a{;:q^I[pKE?g>$gRA;?A:6}55CDTw' );
define( 'AUTH_SALT',        'K$!I$oQW5.O+g2:$?z.l?3BS]PiPxmd{C]yzp#rj}H&. ~Ub$CiuH5GaG),fMwh~' );
define( 'SECURE_AUTH_SALT', 'iC^K#SU5GORpD.dmJ]Wskm{t7YM(X-~lD@t68F0wocQ)i>x[kSg7Z=ioq15]bd9p' );
define( 'LOGGED_IN_SALT',   '1qWX|J2nXhvv(D6d>#ZT|Mnm,a0&$j4(M`OCU?{@8g}M`otTcD%~`Ht3L0M4Q+J+' );
define( 'NONCE_SALT',       '<@QURvMZq*bF> ?~)X==~FYvtJX>~3[wrX)>Lbj8A!fJhs[g)=})#QnElXHLbS/`' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
