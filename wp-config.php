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
define( 'DB_NAME', 'spa_massage' );

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
define( 'AUTH_KEY',         ']3f#{gBpBVsV+~|O{IO@Pft<n ?.H[Nlftn`rD`,e`lzaxAgz#w!eEEe`7k%m$S:' );
define( 'SECURE_AUTH_KEY',  '_9GRhSga=]5$;f^$r~69.J]0t!x`^p85;iZ77ZND*c$@QYLnKN`*B9>G<I`:SFC8' );
define( 'LOGGED_IN_KEY',    'uN9Ki@2B]~79A$;do}9NL(*qd+wU4;0jrMDj!pAl5rRMnDE8[JzB1+NeR6-J.NA*' );
define( 'NONCE_KEY',        'Y_zXrAbJrNr:,?.sPHdvqM5x8*3(?[te :!Z~VZ)0J?PHK(0};}I$.0Penp*A]?Q' );
define( 'AUTH_SALT',        'ofGq:0RLg)_kwLw3^Bd&s~nY*y8E:woieclU`diKBz5/.yHNve(mqI@*f6r)K{D7' );
define( 'SECURE_AUTH_SALT', 'FP>dT`_Zv!cLc+[rXYFfWZc(idN0(-0`Q@tD!K2!v2;#9S:;9GW83)sW$|]kHlBI' );
define( 'LOGGED_IN_SALT',   '6IQw{A2G-L$A[^})4PVfWcdk/D7XSaF,:@P*%HT>0f#R!,U7$PO!kE=9J2o.:B-z' );
define( 'NONCE_SALT',       '+zAu]lIzMJ[sTPLEBI9C`ngcLr;KYxea(ti>t*?bA1||ELGkz1<}TIBHUv/8g1(9' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'smg_';

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
