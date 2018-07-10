<?php

//require dirname(__FILE__) . '/../utils/validation/FormValidation.php';

class FormAction
{
    static function addScripts() {

        wp_enqueue_script( 'ajax-script', plugins_url( '../assets/js/ajax-request.js', __FILE__ ), array('jquery'), '1.12.4', true);
        wp_localize_script( 'ajax-script', 'ajax_object', array(
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ));
    }

    static function cadastro_simples_register()
    {
        try {
            global $wpdb;
            $table_name = $wpdb->prefix . "cadastro_simples";
            $wpdb->insert($table_name, [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'estate' => $_POST['estate'],
                'city' => $_POST['city'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            wp_send_json(['msg' => 'Cadastro realizado com sucesso!'], 200);
        } catch (\Exception $ex) {
            wp_send_json(['msg' => $ex->getMessage()], 500);
        }
    }

}
add_action( 'init_scripts', [
    'FormAction',
    'addScripts'
]);
add_action( 'wp_ajax_nopriv_cadastro_simples_register', [
    'FormAction',
    'cadastro_simples_register'
]);
add_action( 'wp_ajax_cadastro_simples_register', [
    'FormAction',
    'cadastro_simples_register'
]);