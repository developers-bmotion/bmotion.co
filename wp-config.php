<?php
define('WP_CACHE', true);
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
define( 'DB_NAME', 'bmotion' ); //  u832456184_HmmXV

/** MySQL database username */
define( 'DB_USER', 'forge' ); // u832456184_0jGJQ

/** MySQL database password */
define( 'DB_PASSWORD', 'SRnJ04NcPbna2SlJsciu' );  // GsSPgfzfhP

/** MySQL hostname */
define( 'DB_HOST', 'localhost' ); // mysql

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'HT?D?P(?u >R>[IlWu~DsY~~cHyP_wTvbBF7&T,$vx,IVkw)M]-/hpok/G8)[irc' );
define( 'SECURE_AUTH_KEY',   'NYi*( %,~ZDFcz0MrhSi&|fnD mdTCe k$>ePYDIijj3ak*,wzqrx/iJo@C%,tyJ' );
define( 'LOGGED_IN_KEY',     '9kix$*7|q;XYRFq<BWb%D/l4I<8CJs4lu@2/KaN8kr!MQ#bbo.c|7ouL@-oRu&KA' );
define( 'NONCE_KEY',         'kt8K>}w+O9xEdaHc*.D3Czz7=,uH)<dm*uZO?K27 Sr2N-#bqnuyGj.mmdvepkB^' );
define( 'AUTH_SALT',         'p8T#gp6!a>zvRs7]E/y17:M3=Q-1_OZ<U|j,>hZ5`lq|,4:SZdt+AwaO&~#NgCuW' );
define( 'SECURE_AUTH_SALT',  '$KN;AW[INQi@8?9JN(7scju=?J`z]@&K%i|7k#8DQnf#e2K=DBZl5|^WI4_At/q#' );
define( 'LOGGED_IN_SALT',    'DPAx1H1Hyfa/.re(jm2*P~+[dP?A9^KymfqaSd_Cg9`eZH%;i@9wZkl6c6`4 >P?' );
define( 'NONCE_SALT',        '{mc|ifgvR01fE Ez~;/0 t&LIf1&P-0[KG(h}/ jIKd0z%nPsVU(4&D]}`2(A4u?' );
define( 'WP_CACHE_KEY_SALT', '5J.9<,o[N.$V-+`2q`]U@*GWsAdQ2j)f6P^%+D>){1)!:{bX^?GNio>TF`99Y?sA' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('DISALLOW_FILE_EDIT', true);
define('DISALLOW_FILE_MODS', true);
