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
define( 'DB_NAME', 'northshine' );

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
define( 'AUTH_KEY',         'L*A]14_1BU2zNfQ77#z9HHnmUK@8rQLN.7fo!N[h22h~oWDeF<y~iD0zSBHq]UYa' );
define( 'SECURE_AUTH_KEY',  'B0X=,|a5d|W$x|#4(.zY9ni+4i<![&X=]!24;@k.i]*73z,UdZ+,:;w(-Q1KDV4?' );
define( 'LOGGED_IN_KEY',    '~3=A>s=SQk7MU.YW9x][(R 8RG]eXg%Qi1s,SU<>HiG+z)tS|)Nr,/0;}E@G x<c' );
define( 'NONCE_KEY',        '3EK7/_2n<Oqk$f!s9DYr~wwig4fn9SIt3(b9RzVa83BY*&JFxo2[%!.Y!yy(iHgs' );
define( 'AUTH_SALT',        'j~ajX )akEEn^S1KGB+,%BnyJxgRED^8+Z}Y>TgjmTH:4%fGFZ9mh>7v#I2Wfv #' );
define( 'SECURE_AUTH_SALT', '%SMK?~*MCx=5I0?/yl0v_&_6Lf%(x5}Fcu@!HZ[UP@j^I1efj`U*bvxiTs!g91`S' );
define( 'LOGGED_IN_SALT',   '#X%K](:`VUoLq[mDm|ll/P&%^vj+f#@A.zb,/Ww$tJw$/,:vp]lQBRbE#30;TA- ' );
define( 'NONCE_SALT',       ';c.+~grpl1!4$tjfqhtHt95H~#xT;gyf{-]3bj&?<J]`k($++IxI~2DmHI%I<}z!' );

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
