# Cadastro Simples (Wordpress - Plugin)

#### Descrição
O plugin inseri um formulário básico que 
registra: nome, e-mail, cidade e estado na base de 
dados. Além de incluir um novo menu no painel de administração
com as opções de CRUD básicas.

#### Instalação
* Clone do projeto
* Gerar .zip (ignorar o diretório /.git)
* Upload do arquivo.zip para o diretório:
`../meu-wordpress/wp-content/plugins/`
* Descompactar o zip
* No final do processo deve-se ter o diretório 
`../meu-wordpress/wp-content/plugins/cadastro-simples/`
com a seguinte estrutura:
```
actions/
assets/
core/
utils/
index.php
README.md
```
**Observação:**
O arquivo .zip também pode ser 
enviado via Painel do Wordpress > Plugins > Adicionar Novo > Upload

#### Banco de Dados
Ao ser ativado o plugin cria a tabela de registros no banco executando o seguinte SQL:

```
CREATE TABLE `wp_cadastro_simples` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estate` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
```

#### Exemplo de uso
Aplicar o `shortcode`
```
[cadastro_simples title="Registre-se aqui!" submit="Registrar" icon="dashicons-yes"]
```
Sendo os parâmetros:
* `title`: Título de topo do formulário
* `submit`: Label do botão de envio do formulário
* `icon`: Classe do ícone do botão - [Dashicons](https://developer.wordpress.org/resource/dashicons/#media-archive)