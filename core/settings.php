<?php

define('ROOTDIR', plugin_dir_path(__FILE__));

add_filter('widget_text', 'do_shortcode');
add_action('admin_menu', 'adminItemMenu');

function adminItemMenu()
{
    add_menu_page(
        'Cadastro Simples | Gerenciamento',
        'Cadastro Simples',
        'manage_options',
        'cadastro-simples-list',
        'cadastroSimplesList',
        'dashicons-groups',
        3
    );

    add_submenu_page('cadastro-simples-list',
        'Cadastro Simples | Novo Registro',
        'Novo Registro',
        'manage_options',
        'cadastro-simples-create',
        'cadastroSimplesCreate'
    );

    add_submenu_page(null,
        'Cadastro Simples | Atualizar Registro',
        'Atualizar',
        'manage_options',
        'cadastro-simples-update',
        'cadastroSimplesUpdate'
    );

    add_submenu_page(null,
        'Cadastro Simples | Deletar Registro',
        'Deletar',
        'manage_options',
        'cadastro-simples-delete',
        'cadastroSimplesDelete'
    );
}

require_once(ROOTDIR . '../actions/create.php');
require_once(ROOTDIR . '../actions/list.php');
require_once(ROOTDIR . '../actions/update.php');
require_once(ROOTDIR . '../actions/delete.php');