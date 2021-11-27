<?php

    if (empty($_POST)) { 

        $nome = '';
        $razaoSocial = '';
        $cnpj = '';
        $cep = '';
        $endereco = '';
        $numero = '';
        $complemento = '';
        $bairro = '';
        $estado = '';
        $municipio = '';
        $telefone = '';
        $celular = '';
        $email = '';
        $informacoesComplementares = '';

        formulario($nome, $razaoSocial, $cnpj, $cep, $endereco, $numero, $complemento, $bairro, $estado, $municipio, $telefone, $celular, $email, $informacoesComplementares); 

        

    }else {
        $dados = $_POST;
        $opcao = $dados['btn'];

        if ($opcao == 'salvar') {
            $nome = $dados['txtNome'];
            $razaoSocial = $dados['txtRazaoSocial'];
            $cnpj = $dados['txtCnpj'];
            $cep = $dados['txtCep'];
            $endereco = $dados['txtEndereco'];
            $numero = $dados['txtNumero'];
            $complemento = $dados['txtComplemento'];
            $bairro = $dados['txtBairro'];
            $estado = $dados['txtEstado'];
            $municipio = $dados['txtMunicipio'];
            $telefone = $dados['txtTelefone'];
            $celular = $dados['txtCelular'];
            $email = $dados['txtEmail'];
            $informacoesComplementares = $dados['txtInformacoesComplementares'];

            require_once 'Classes/Candidato.php';
            $empresa = new Empresa($nome, $razaoSocial, $cnpj, $cep, $endereco, $numero, $complemento, $bairro, $estado, $municipio, $telefone, $celular, $email, $informacoesComplementares);

            $empresa->inserir($empresa->getNome(), $empresa->getRazaoSocial(), $empresa->getCnpj(), $empresa->getCep(), $empresa->getEndereco(), $empresa->getNumero(), $empresa->getComplemento(), $empresa->getBairro(), $empresa->getEstado(), $empresa->getMunicipio(), $empresa->getTelefone(), $empresa->getCelular(), $empresa->getEmail(), $empresa->getInformacoesComplementares() );

            echo("Cadastro inserido com sucesso, você será redirecionado para a Home.");
            header('Refresh:3; url=index.html');

        }

        if($opcao == 'pesquisarIdEmpresa'){
            $empresa = $dados['txtIdEmpresa'];

            require_once 'Classes/Candidato.php';
            $empresaObjeto = new Empresa;
            $result = $empresaObjeto->pesquisarIdEmpresa($empresa);
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                relatorio($row);
            }else {
                echo 'A pesquisa nao retornou nenhum resultado';    
        }
    }

        if($opcao == 'pesquisarNome'){
            $nome = $dados['txtPesquisarNome'];

            require_once 'Classes/Candidato.php';
            $empresaObjeto = new Empresa;
            $result = $empresaObjeto->pesquisarNome($nome);

            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                relatorio($row);
            }else {
                echo 'A pesquisa nao retornou nenhum resultado';
            }
        }
    }

    function formulario($nome, $razaoSocial, $cnpj, $cep, $endereco, $numero, $complemento, $bairro, $estado, $municipio, $telefone, $celular, $email, $informacoesComplementares) {
        $formulario = file_get_contents('formAdm.html');
        $formulario = str_replace('{nome}', $nome, $formulario);
        $formulario = str_replace('{razaoSocial}', $razaoSocial, $formulario);
        $formulario = str_replace('{cnpj}', $cnpj, $formulario);
        $formulario = str_replace('{cep}', $cep, $formulario);
        $formulario = str_replace('{endereco}', $endereco, $formulario);
        $formulario = str_replace('{numero}', $numero, $formulario);
        $formulario = str_replace('{complemento}', $complemento, $formulario);
        $formulario = str_replace('{bairro}', $bairro, $formulario);
        $formulario = str_replace('{estado}', $estado, $formulario);
        $formulario = str_replace('{municipio}', $municipio, $formulario);
        $formulario = str_replace('{telefone}', $telefone, $formulario);
        $formulario = str_replace('{celular}', $celular, $formulario);
        $formulario = str_replace('{email}', $email, $formulario);
        $formulario = str_replace('{informacoesComplementares}', $informacoesComplementares, $formulario);

        print $formulario;
    }

    function relatorio($linha){

        $relatorio = file_get_contents('relatorio.html');
        $relatorio = str_replace('{idEmpresa}', $linha['idEmpresa'] ,$relatorio);
        $relatorio = str_replace('{nome}', $linha['nome'] ,$relatorio);
        $relatorio = str_replace('{razaoSocial}', $linha['razaoSocial'], $relatorio);
        $relatorio = str_replace('{cnpj}', $linha['cnpj'], $relatorio);
        $relatorio = str_replace('{cep}', $linha['cep'], $relatorio);
        $relatorio = str_replace('{endereco}', $linha['endereco'], $relatorio);
        $relatorio = str_replace('{numero}',$linha['numero'], $relatorio);
        $relatorio = str_replace('{complemento}', $linha['complemento'], $relatorio);
        $relatorio = str_replace('{bairro}', $linha['bairro'], $relatorio);
        $relatorio = str_replace('{estado}', $linha['estado'], $relatorio);
        $relatorio = str_replace('{municipio}', $linha['municipio'], $relatorio);
        $relatorio = str_replace('{telefone}', $linha['telefone'], $relatorio);
        $relatorio = str_replace('{celular}', $linha['celular'], $relatorio);
        $relatorio = str_replace('{email}', $linha['email'], $relatorio);
        $relatorio = str_replace('{informacoesComplementares}', $linha['informacoesComplementares'], $relatorio);

        print $relatorio;
    }
?>