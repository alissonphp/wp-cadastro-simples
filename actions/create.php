<?php

function cadastroSimplesCreate()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "cadastro_simples";

    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/cadastro-simples/assets/css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <div class="wrap">
        <h2>Cadastro Simples | Novo Registro</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a class="act_link" href="<?php echo admin_url('admin.php?page=cadastro-simples-list'); ?>"><span class="dashicons dashicons-arrow-left-alt2"></span> Voltar</a>
            </div>
            <br class="clear">
        </div>
        <?php
        if (isset($_POST['name']) && isset($_POST['email'])) {
        $wpdb->insert($table_name, [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'estate' => $_POST['estate'],
                'city' => $_POST['city'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        ]); ?>
            <div class="alert alert-success" role="alert">
                Registro salvo com sucesso!
            </div>
            <?php
        } ?>
        <form action="<?php echo admin_url('admin.php?page=cadastro-simples-create'); ?>" method="post">
            <div class="row">
                <div class="col">
                    <label for="name">Nome:</label>
                    <input class="form-control" type="text" id="name" name="name" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="email">E-mail:</label>
                    <input class="form-control" type="email" id="email" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="estate">Estado:</label>
                    <select class="form-control" name="estate" id="estate" required>
                        <option value="">Selecione...</option>
                        <option value="RO">RO</option>
                        <option value="AC">AC</option>
                        <option value="AM">AM</option>
                        <option value="RR">RR</option>
                        <option value="PA">PA</option>
                        <option value="AP">AP</option>
                        <option value="TO">TO</option>
                        <option value="MA">MA</option>
                        <option value="PI">PI</option>
                        <option value="CE">CE</option>
                        <option value="RN">RN</option>
                        <option value="PE">PE</option>
                        <option value="PB">PB</option>
                        <option value="AL">AL</option>
                        <option value="SE">SE</option>
                        <option value="BA">BA</option>
                        <option value="MG">MG</option>
                        <option value="ES">ES</option>
                        <option value="RJ">RJ</option>
                        <option value="PR">PR</option>
                        <option value="SC">SC</option>
                        <option value="RS">RS</option>
                        <option value="MS">MS</option>
                        <option value="MT">MT</option>
                        <option value="GO">GO</option>
                        <option value="DF">DF</option>
                    </select>
                </div>
                <div class="col">
                    <label for="city">Cidade:</label>
                    <input class="form-control" name="city" type="text" id="city" required>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col">
                    <button type="submit" class="btn btn-block btn-primary">Salvar Registro</button>
                </div>
            </div>
        </form>
    </div>

    <?php
}