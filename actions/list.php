<?php

function cadastroSimplesList()
{
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/cadastro-simples/assets/css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <div class="wrap">
        <h2>Cadastro Simples | Dashboard</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a class="act_link" href="<?php echo admin_url('admin.php?page=cadastro-simples-create'); ?>"><span class="dashicons dashicons-plus-alt"></span> Inserir Novo</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "cadastro_simples";
        $rows = $wpdb->get_results("SELECT id,name,email,estate,city,created_at from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column">Nome</th>
                <th class="manage-column">E-mail</th>
                <th class="manage-column">UF</th>
                <th class="manage-column">Cidade</th>
                <th class="manage-column">Ações</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column"><?php echo $row->name; ?></td>
                    <td class="manage-column"><?php echo $row->email; ?></td>
                    <td class="manage-column"><?php echo $row->estate; ?></td>
                    <td class="manage-column"><?php echo $row->city; ?></td>
                    <td class="manage-column"><?php echo date('d/m/Y H:i', strtotime($row->created_at)); ?></td>
                    <td>
                        <a href="<?php echo admin_url('admin.php?page=cadastro-simples-update&id=' . $row->id); ?>">
                            <span class="dashicons dashicons-edit"></span>
                        </a>
                        <a href="<?php echo admin_url('admin.php?page=cadastro-simples-delete&id=' . $row->id); ?>">
                            <span class="dashicons dashicons-trash">
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <?php
}