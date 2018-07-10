<?php

function cadastroSimplesDelete()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "cadastro_simples";

    if (isset($_GET['id'])) {
        $row = $wpdb->get_row("SELECT id, name, email, estate, city FROM $table_name WHERE id = {$_GET['id']}");
    }
    if (isset($_GET['act']) && isset($_GET['id']) && $_GET['act'] == "confirm") {
        $wpdb->delete($table_name,
            ['id' => $_GET['id']]
        );
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/cadastro-simples/assets/css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <div class="wrap">
        <h2>Cadastro Simples | Confirmar exclusão</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a class="act_link" href="<?php echo admin_url('admin.php?page=cadastro-simples-list'); ?>"><span class="dashicons dashicons-arrow-left-alt2"></span> Voltar</a>
            </div>
            <br class="clear">
        </div>
        <?php
        if (isset($_GET['act']) && isset($_GET['id']) && $_GET['act'] == "confirm") {
            $wpdb->delete($table_name,
                ['id' => $_GET['id']]
            ); ?>
            <div class="alert alert-success" role="alert">
                Registro deletado!
            </div>
        <?php } else { ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Deseja mesmo excluir o registro?</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row->name;?></h6>
                    <a href="<?php echo admin_url('admin.php?page=cadastro-simples-list'); ?>" class="btn btn-primary">Voltar</a>
                    <a href="<?php echo admin_url('admin.php?page=cadastro-simples-delete&act=confirm&id=' . $row->id); ?>" class="btn btn-danger">Confirmar</a>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php
}