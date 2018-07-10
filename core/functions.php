<?php
class CadastroSimples
{
    public function init($atts)
    {
        extract(shortcode_atts([
            "title" => "",
            "submit" => "",
            "icon" => ""
        ], $atts));
        $title = isset($title) ? $title : "Cadastro Simples";
        $submit = isset($submit) ? $submit : "Cadastrar";
        $icon = isset($icon) ? $icon : "dashicons-yes";
        echo self::renderViewForm($title, $submit, $icon);
    }

    public function renderViewForm(string $title, string $submit, string $icon)
    {

        echo '
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <div class="wrap">
            <h2>' . $title . '</h2>
            <form action="'.admin_url( 'admin-ajax.php' ).'" name="cadastro-simples-register">
            <input type="hidden" name="action" value="cadastro_simples_register">
                <div class="row">
                <div class="col">
                    <label for="name">Nome:</label>
                    <input class="form-control" type="text" id="name" name="name">
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
                    <label for="estate">UF:</label>
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
                   <button type="submit" class="btn btn-block btn-primary"><span class="dashicons ' . $icon . '"></span>' . $submit . '</button>
                </div>
            </div>
        </form>
    </div>
    <script type="application/javascript" src="'.plugins_url('../assets/js/ajax-request.js', __FILE__).'"></script>
    ';
    }
}

add_shortcode('cadastro_simples', [
    'CadastroSimples',
    'init'
]);

