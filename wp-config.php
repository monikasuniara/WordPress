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
define( 'DB_NAME', 'scrum' );

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
define( 'AUTH_KEY',         'X,)#${:hT9YTFLUo!+R>f3{PblBW3FhUk!*&r,k.bJ}ejf-eBozGqzq!x]nQk)*#' );
define( 'SECURE_AUTH_KEY',  'oh/=u,QZZG_]^G b->|lF|*K:jY/2q&i0sf;5R>?N U91?d!>fO@&_[U~xa_peYV' );
define( 'LOGGED_IN_KEY',    'Z0TFlz1Cu>h8,by&o!O6sG%ku:8Qie)uJC #PC1ggiGZ;q^6Fj!c8?Yk8$!kxv6r' );
define( 'NONCE_KEY',        'qO*TnAF`J0`(2MBeO44f%1PCj]B0~`Ri.@J/&M[P-}n.Yh)sR/P)=@^hP-R|7pt<' );
define( 'AUTH_SALT',        '==$k-FLaK:_GBjP*(^}Q+||$ A_@Y~,`B5w8=m|aAM.-G1R}!a=J#8,NT>^~+PsX' );
define( 'SECURE_AUTH_SALT', 'gHtswS2?!A1J`[Rjs%[~C%Ra],uBpn7nL6 V4c>WswR9&u9$AP=u(IvQ5dk#lc*F' );
define( 'LOGGED_IN_SALT',   '([de~@(>EX}`*Fr)Bt$8[Q_@<4x![L+R2)N*t4HPyz?7&!y4sUPXj-(E?g;LpV>r' );
define( 'NONCE_SALT',       '$57|!EvE([:)k09Yvb7X$`6F4FE.1M`qe>7a4)[G$C:T%U*![-oszNcg(jmZzcqM' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'eais_';

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
