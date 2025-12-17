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
define( 'DB_NAME', 'MyPortforio' );


/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'pZa$OvxWru4)o*~OeLr7gS$sHm~,F,Wh{`Euqqa!uwmV,DR2>XJA5s6EFup2MEd%' );
define( 'SECURE_AUTH_KEY',  'M!n5ithwOJL^E!<$y_L[_we5+8$E6c#wfM$h*`^#4~eV6&9l7t !}DXcmknd[=?M' );
define( 'LOGGED_IN_KEY',    'FSdftCr?(eP1[oAIrBs)IoTObU1Hu. CQixc_%&g++y3m:z@ndk58C1jLO*-eP}L' );
define( 'NONCE_KEY',        'OXlY8:c>~|.1c%RKKpJ-RE1] +=l,;VDPUW5V5$N1N%*|.?GV-zo$;,wl.Y=Q{n6' );
define( 'AUTH_SALT',        'G6[Fob$D~:7>O1Pb)u[1@~&A@F@bt$T23[ZiHM;oe;rMM8]}_N-UTJgO8_dq#8xy' );
define( 'SECURE_AUTH_SALT', 'XS$30C;/*({{sh,$OR^&!X,vPa.f:1f511nyU2L88a69N+>Gx{/YO}m*dPD)Pz#_' );
define( 'LOGGED_IN_SALT',   'Q$EXhna!:2EIn.)ns!|h[<Z7_%v@bym}2iU!|Y^V=2^N31.$D]df9i`3c0t3P}./' );
define( 'NONCE_SALT',       'Wbz^OOvcW;%xko*dKV+*3?Y>4tdA>oWu_i`&h2M`KRcmMoF#-tu={#%KcFV<=#ia' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
