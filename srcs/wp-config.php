<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'mvan-eyn' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'mvan-eyn6666@' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8' );

/** Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define('DB_COLLATE', '');


/**#@+
* Clés uniques d’authentification et salage.
*
* Remplacez les valeurs par défaut par des phrases uniques !
* Vous pouvez générer des phrases aléatoires en utilisant
* {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
* Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
* Cela forcera également tous les utilisateurs à se reconnecter.
*
* @since 2.6.0
 */
define( 'AUTH_KEY',         'c51783e2503cc6cea3da56f05aadd74c99c943da' );
define( 'SECURE_AUTH_KEY',  '35806ff625e61e1c96d7d5f26431820674c47cb0' );
define( 'LOGGED_IN_KEY',    'fd3856e84b728377add0dfc2f12132fb853210ff' );
define( 'NONCE_KEY',        '9ed4abaf0b486f911bc34478dde91281339bfa97' );
define( 'AUTH_SALT',        'e5593b7d543139d220a4564ede55e8c1f8cc661b' );
define( 'SECURE_AUTH_SALT', '9997247944ee4f9940ddfcb5b3f1d450a578717c' );
define( 'LOGGED_IN_SALT',   '19b433bf839cab7a3f4ec4d3df5c9a3589525050' );
define( 'NONCE_SALT',       '7bdedf5928a71cf8d9385e76c361ac65b5257e17' );
/**#@-*/
/**
* Préfixe de base de données pour les tables de WordPress.
*
* Vous pouvez installer plusieurs WordPress sur une seule base de données
* si vous leur donnez chacune un préfixe unique.
* N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
*/
$table_prefix = 'wp_';

/**
* Pour les développeurs : le mode déboguage de WordPress.
*
* En passant la valeur suivante à "true", vous activez l’affichage des
* notifications d’erreurs pendant vos essais.
* Il est fortemment recommandé que les développeurs d’extensions et
* de thèmes se servent de WP_DEBUG dans leur environnement de
* développement.
*
* Pour plus d’information sur les autres constantes qui peuvent être utilisées
* pour le déboguage, rendez-vous sur le Codex.
*
* @link https://codex.wordpress.org/Debugging_in_WordPress
*/
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
