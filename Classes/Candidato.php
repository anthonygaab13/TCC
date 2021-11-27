<?php
        require_once 'Conexao.php';

    class Empresa {
        private $idEmpresa;
        private $nome;
        private $razaoSocial;
        private $cnpj;
        private $cep;
        private $endereco;
        private $numero;
        private $complemento;
        private $bairro;
        private $estado;
        private $municipio;
        private $telefone;
        private $celular;
        private $email;
        private $informacoesComplementares;
        
        public function __construct($nome='', $razaoSocial='', $cnpj='', $cep='', $endereco='', $numero='', $complemento='', $bairro='', $estado='', $municipio='', $telefone='', $celular='', $email='', $informacoesComplementares=''){

                $this->nome = $nome;
                $this->razaoSocial = $razaoSocial;
                $this->cnpj = $cnpj;
                $this->cep = $cep;
                $this->endereco = $endereco;
                $this->numero = $numero;
                $this->complemento = $complemento;
                $this->bairro = $bairro;
                $this->estado = $estado;
                $this->municipio = $municipio;
                $this->telefone = $telefone;
                $this->celular = $celular;
                $this->email = $email;
                $this->informacoesComplementares = $informacoesComplementares;  
        }

        // INÍCIO GETTERS E SETTERS \\

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }


        public function getRazaoSocial()
        {
                return $this->razaoSocial;
        }


        public function setRazaoSocial($razaoSocial)
        {
                $this->razaoSocial = $razaoSocial;

                return $this;
        }


        public function getcnpj()
        {
                return $this->cnpj;
        }


        public function setcnpj($cnpj)
        {
                $this->cnpj = $cnpj;

                return $this;
        }


        public function getCep()
        {
                return $this->cep;
        }


        public function setCep($cep)
        {
                $this->cep = $cep;

                return $this;
        }


        public function getEndereco()
        {
                return $this->endereco;
        }


        public function setEndereco($endereco)
        {
                $this->endereco = $endereco;

                return $this;
        }


        public function getNumero()
        {
                return $this->numero;
        }


        public function setNumero($numero)
        {
                $this->numero = $numero;

                return $this;
        }

        public function getComplemento()
        {
                return $this->complemento;
        }


        public function setComplemento($complemento)
        {
                $this->complemento = $complemento;

                return $this;
        }


        public function getBairro()
        {
                return $this->bairro;
        }


        public function setBairro($bairro)
        {
                $this->bairro = $bairro;

                return $this;
        }


        public function getEstado()
        {
                return $this->estado;
        }


        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }

        public function getMunicipio()
        {
                return $this->municipio;
        }

 
        public function setMunicipio($municipio)
        {
                $this->municipio = $municipio;

                return $this;
        }


        public function getTelefone()
        {
                return $this->telefone;
        }

 
        public function setTelefone($telefone)
        {
                $this->telefone = $telefone;

                return $this;
        }

        public function getCelular()
        {
                return $this->celular;
        }


        public function setCelular($celular)
        {
                $this->celular = $celular;

                return $this;
        }


        public function getEmail()
        {
                return $this->email;
        }


        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function getInformacoesComplementares()
        {
                return $this->informacoesComplementares;
        }

        public function setInformacoesComplementares($informacoesComplementares)
        {
                $this->informacoesComplementares = $informacoesComplementares;

                return $this;
        }
        // FIM GETTERS E SETTERS \\
    
    public function inserir($nome='', $razaoSocial='', $cnpj='', $cep='', $endereco='', $numero='', $complemento='', $bairro='', $estado='', $municipio='', $telefone='', $celular='', $email='', $informacoesComplementares=''){
            $conn = Conexao::getConexao();
            $msg = false;
            if(isset($_FILES['arquivo'])){

                $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //Pega a extensão do arquivo
                $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
                $diretorio = "upload/"; //define o diretório para onde enviaremos o arquivo

                move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

            }

            $sql ="INSERT INTO empresa (nome, razaoSocial, cnpj, cep, endereco, numero, complemento, bairro, estado, municipio, telefone, celular, email, informacoesComplementares, arquivo) VALUE (
                    '{$nome}',
                    '{$razaoSocial}',
                    '{$cnpj}',
                    '{$cep}',
                    '{$endereco}',
                    '{$numero}',
                    '{$complemento}',
                    '{$bairro}',
                    '{$estado}',
                    '{$municipio}',
                    '{$telefone}',
                    '{$celular}',
                    '{$email}',
                    '{$informacoesComplementares}',
                    '{$novo_nome}'
            )";
                

            $conn->exec($sql);
            Conexao::fecharConexao();
        }
            
        public function pesquisarIdEmpresa($idEmpresa){
                $conn = Conexao::getConexao();
                $sql = "SELECT * FROM empresa WHERE idEmpresa = $idEmpresa";
                $result = $conn->query($sql);
                Conexao::fecharConexao();
  
                return $result;
         }
  
        public function pesquisarNome($nome){
                $conn = Conexao::getConexao();
                $sql = "SELECT * FROM empresa WHERE nome = '$nome'";
                $result = $conn->query($sql);
                Conexao::fecharConexao();
  
                return $result;
        }
    }
?>