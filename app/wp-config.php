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
define('DB_NAME', 'benito_cdne');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'fC OczH;y*x<~H.{Bi) 9*^DZkG!Ia/+S6#]uiV~Ixll^oRsQCt<jHV{tXYa/*2D');
define('SECURE_AUTH_KEY',  'xHp&1beGgn|m@$2[Vw@>G{r!|]FRPupJxE!9kY=-AOf~.o,6~PJt2KJzUkqcahk3');
define('LOGGED_IN_KEY',    '^1lcn8V[`bx}>[PwhdBeArmYM>UlWFpDCP)g]:?(f?a9{9c!nwZHY#TS4wegtY>5');
define('NONCE_KEY',        '&J/1(/~c?#P^G`k=dDiC(HzpuRYqPM4[1%@c~=QP!=7Jw9phme{mn-{+g?QO<u-T');
define('AUTH_SALT',        '02Bd5rj^u8hhog~PiZ>|5?_#aYCL_mPvgD<-4h-MDlD~fBq-?:jML26EyZd4X=bg');
define('SECURE_AUTH_SALT', 'd8?f%j}Le6J4|,+Z7Ak4@(IC tIe:J;3nJSYK_HAiP(S>_29daps1i$GpYz`%Yet');
define('LOGGED_IN_SALT',   'G@8e_b/,T6r9=Bd0p?E!q34wfQ^<(1C$G@*&B6K:^0KPM+5Mf#VUWxt3jc!vb9Bl');
define('NONCE_SALT',       '~|.4;7G$kpuGNK~`GOdmXF`0/M^j&!gYw(IcOB_|r2K@@N;qbr&qBDfXj-sP*0}P');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bvpsbh_';

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
