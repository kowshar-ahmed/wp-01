<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-01' );

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
define( 'AUTH_KEY',         '^TAs.1&C2qM7x_}rM`(D#QLy|ZYXLil`6JTZG^h^lVA.Js5?V;QT73>IZEo[E hu' );
define( 'SECURE_AUTH_KEY',  ',46`vIpr+Tst@|GV}:x`G[y<kC.)49ku^HEB:c<8*g|Vh|u>hq2X^@!3GyaFlM.e' );
define( 'LOGGED_IN_KEY',    'lO>nWvU-gEzXbaEm?;Vw`p=%SV{P(,M1)8r!0Sn&w!aogDwF(jn}6k_=uN`#GmC ' );
define( 'NONCE_KEY',        'Q:LVK`+Uz?[-YAWxdU}1c1gF2}[l.A8,,H6@%BwZqD.:}x!}6A+>[KgBv~& |f]R' );
define( 'AUTH_SALT',        '<7.c(hq)jAVz:h.+Y5nt$ppQe~p=`dM_)8lF|Y`?Seg,S){4kJKBR4i+iTarWyx}' );
define( 'SECURE_AUTH_SALT', 'i>%<^AHo4b@H&)* Q3cO]OiGUdM} p49iowm@=CW0Fv UO~P?!B[0-v8lO`j[=f;' );
define( 'LOGGED_IN_SALT',   '*HV}fsTgsBEuf)KM,?SLAS&Pe,c~;MDN#K7Y)u/,*!M7z$=_mSVfYH!EV`0kCSc)' );
define( 'NONCE_SALT',       '7ggf(?#e(_FM>n|E/j[9G_.KEhS[]2u$M0xuYF#mOXgq9,eY5Th0kC#+ve^?=dA0' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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