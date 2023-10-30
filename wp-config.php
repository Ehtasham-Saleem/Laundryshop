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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'laundryshop' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'q>R.JTfe26h@Pg;rnY,;tYv/]yOWUG|nL1?5Qw^gK#cx=A8?qZ[~x3AyqvOGA)/{' );
define( 'SECURE_AUTH_KEY',  'MXm*&`z=%}1H_;JuG|6nXmm*4(@t?WRnP%bsiO/ }!]tA$GqiuAk=CR!bbD}bE;X' );
define( 'LOGGED_IN_KEY',    'x,bWzD|~@6cuf)eJ;[Hdqze~:?g5 +P8=l}k%X|6<EwBorRfj#e<}|2r0:cs~Z$.' );
define( 'NONCE_KEY',        'MKjIQUw)M.Nk`k[n]K*[MJcz2XcOvHFfN<>fMN[$C^f1sUyL{yk#<z@k;R}5_3H_' );
define( 'AUTH_SALT',        '9 k%*l,Ro`x;4Vh`n`-^4@hHUO!Ma!*+0oa,f{$awqDeK=*>bY8i?iuLg6wj% {H' );
define( 'SECURE_AUTH_SALT', '0o&j/&AjS~kwZl&*7U~6.h+R#D;jO/:-6(vneaB=:C .;74,=qPhW<}vZ*!l[9!v' );
define( 'LOGGED_IN_SALT',   'WcxRqvqnv.jB$f[sCDYv)3=*[5wSLr!X/C|bNQ !>c&*ErdZ g:!Isf+$iTayHS<' );
define( 'NONCE_SALT',       ')D#`;._rI w:,NuWGXmHTX+qXdm(a-1h#Ud< Y<E1U=VY@lSeb61U3yZAfN8)ivn' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
