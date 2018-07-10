<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
* Plugin name: Cadastro Simples
* Description: O plugin inseri um formulário básico que registra: nome, e-mail, cidade e estado na base de dados.
* Version: 1.0
* Author: Alisson Gomes <alisson.php@gmail.com>
*/

function createTable() {
    global $wpdb;
    $table_name = $wpdb->prefix . "cadastro_simples";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` mediumint(9) CHARACTER SET utf8 NOT NULL auto_increment,
            `name` varchar(220) CHARACTER SET utf8 NOT NULL,
            `email` varchar(120) CHARACTER SET utf8 NOT NULL,
            `estate` varchar(80) CHARACTER SET utf8 NOT NULL,
            `city` varchar(120) CHARACTER SET utf8 NOT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

register_activation_hook(__FILE__, 'createTable');

require dirname(__FILE__) . '/core/settings.php';
require dirname(__FILE__) . '/core/functions.php';
require dirname(__FILE__) . '/core/form-action.php';