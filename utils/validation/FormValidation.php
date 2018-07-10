<?php

class FormValidation
{
    private $data = [];
    private $required = [];

    public function __construct(array $formData, array $required)
    {
        $this->data = $formData;
        $this->required = $required;
    }

    public function notEmpty()
    {
        try {
            foreach ($this->required as $r) {
                if ($this->data[$r] == "") {
                    throw new Exception('O field ' . $r . ' não pode ser vazio.');
                }
            }
            return $this;

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function emailCheck()
    {

        try {
            global $wpdb;
            $table_name = $wpdb->prefix . "cadastro_simples";
            $res = $wpdb->get_results("SELECT email FROM {$table_name} WHERE email = '" . $this->data['email'] . "'");
            if (count($res) > 0) {
                throw new Exception('E-mail informado já foi cadastrado');
            }

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

}