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
define( 'DB_NAME', 'test_wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'CCc12~TI0Hat5$p-|jsa^;ZhKCLZDtfO=vL{bN6Qd!ip0u[]u>5sSkb&{IDaq>&a' );
define( 'SECURE_AUTH_KEY',  'XQ(YG#0]rl#[R>~ioYz[R#ZD>X?36dTW2=#bv%WhZHw:!d?CVB#dB2i?ERoU0 x3' );
define( 'LOGGED_IN_KEY',    '|GF_:sVN)Kq)1+2j([2R9cw3oQ&|urSy4<5z`ZIO12}`V!U8!+UkMVG`&H9H?$B3' );
define( 'NONCE_KEY',        '*vMQ:[hx1J5R!G]t>,O-,=s0yGobaT|72H+@6hJr)^rE!wVRuoT]Z>ebuNi]](7K' );
define( 'AUTH_SALT',        '<G19IORo%19jjcaSTa<kn*9G7tgNR*P)M#f5uWodha1chC=,(Gp5[UTdZWAUa-he' );
define( 'SECURE_AUTH_SALT', ':+G{`jp91o2dXb+^Wrd/8 -n;qY:ZC!H>sA:/cP*j5?Fn%r<x&9iL*`75j%I[~^r' );
define( 'LOGGED_IN_SALT',   'f9MMmhY)yB8C=$L?EYJ.)yO[3 smg(=fP%}ouGl`#9A?5v=ozMMy{S7p-]h|TP#N' );
define( 'NONCE_SALT',       '~[ hSdcb|YQo<I6z+~8xlf]4D}9aZq&2iW3N]LDS7vDuaeS;%6I9+53T>|<km57L' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
