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
define('DB_NAME', 'sieuthikhoadientu');

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
define('AUTH_KEY',         'Bx? b<r9P sf2@}NeCdXZ<Yw2KNYx{z6#sfPh$OY<JeJ15tW*r<P/|]?fao=Ec/L');
define('SECURE_AUTH_KEY',  'xd?4=A}9Q_BW>qk,)|n*AJKEg0TcA`CYdi[s_Jo_k HBJ6:)_kwdeB2QvjX+$Tl ');
define('LOGGED_IN_KEY',    ';c+2q=`x>opI`sMj{F:nlf2|{``!f4DIYpSGDazwp_qi $^= UYj`[GrK(MBu,YK');
define('NONCE_KEY',        '?lr+(VMq>6D3,:?3#<Il@ohPL(<NC1u*Xe|;@Z`wIJ:~uI#96%!x#K]Yic7b0xV)');
define('AUTH_SALT',        '<vOfSkBQJE1Y)RDBX6;@[rMyr3{R=fr*ZVfHG$BjC&|yY,H^#+f(V!Uu_KC!ENy!');
define('SECURE_AUTH_SALT', 'N1xDH,yr4K^A_cf}vJL2![.Zcg=Uu}buTN}{9Z(^Ex;  Boyi)V<t,JL4r.vt,?U');
define('LOGGED_IN_SALT',   '0/-6G(nqK_V]qV`Fqq0W`.*Txp$+ry?B8iYCX_odQfp#nW;-mu(].U{ Hz=IpYcS');
define('NONCE_SALT',       ' 1/(Fbw]frR}p9#MxRL@iAl7V@xZ9~vM<I4:yYhZ`uKfk$IK+LfjJ+/hH%=^8#ZV');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
