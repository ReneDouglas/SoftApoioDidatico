<?php
	final class TAcesso {
		static private $prefixoChaves = 'usuario_';
		static private $erro = '';
		
		/*
     	* método __construct()
     	* Está declarado como private para impedir que se crie instâncias de TTransaction
     	*/
		private function __construct() {}
		/** 
     	* Valida se um usuário existe 
		* 
		* @param string $login - O login que será validado 
		* @param string $senha - A senha que será validada 
		* @return boolean - Se o usuário existe ou não 
		*/ 
		static private function validaUsuario($login, $senha){
			
			$repositorio = new TRepository('Usuario');
			
			// cria critério de seleção baseado no login
			$criteria = new TCriteria;
			$criteria->add(new TFilter('login', '=', $login));
			$criteria->add(new TFilter('senha', '=', $senha));
			
			$query = $repositorio->load($criteria);
			
			if($query){
				// Se houver apenas um usuário, retorna true 
				$total = sizeof($query);
				return ($total == 1) ? true : false;
			}
			else{
				// A consulta foi mal sucedida, retorna false
				return false;
			}
		}
		/** 
		* Loga um usuário no sistema salvando seus dados na sessão 
		* 
		* @param string $login - O usuário que será logado 
		* @param string $senha - A senha do usuário 
		* @return boolean - Se o usuário foi logado ou não 
		*/ 
		static public function logaUsuario($login, $senha){
			// Verifica se é um usuário válido
			if(self::validaUsuario($login,$senha)){
				// Inicia a sessão
				new TSession;
				
				$user = new Usuario;
				$user = $user->load_login($login);
				// Se a consulta falhou
				if (!$user) { 
                    // A consulta foi mal sucedida, retorna false 
                    $this->erro = 'A consulta dos dados é inválida'; 
                    return false; 
                }
				// Passa os dados para a sessão
				foreach($user->toArray() as $chave=>$valor){
					if($chave!='senha'){
						TSession::setValue(self::$prefixoChaves . $chave, $valor);
					}
				}
				// Usuário logado com sucesso 
           		TSession::setValue(self::$prefixoChaves . 'logado', true);
				
				return true;
				
			} else { 
				self::$erro = 'Usuário ou senha inválidos'; 
				return false; 
        	}
		}
		
		/** 
		* Verifica se há um usuário logado no sistema 
		* 
		* @return boolean - Se há um usuário logado ou não 
		*/ 
		static public function usuarioLogado() { 
			// Inicia a sessão
			new TSession; 
			 
			// Verifica se não existe o valor na sessão 
			if (!TSession::getValue(self::$prefixoChaves . 'logado')) { 
				return false; 
			} 
			return true; 
		}
		/** 
		* Faz logout do usuário logado 
		* 
		* @return boolean 
		*/
		static public function logout() { 
			TSession::freeSession();
			return !self::usuarioLogado();
		}
		/** 
		* Verifica se há usuário logado
		* 
		* redireciona para o login
		* encerra a aplicação
		*/
		static public function verificar() {
			if(!self::usuarioLogado()){
				header("Location:login.php");
				exit(0);
			}
		}
		
		static public function getValor($nome) {
			return TSession::getValue(self::$prefixoChaves . $nome);
		}
		static public function setValor($nome, $valor) {
			TSession::setValue(self::$prefixoChaves . $nome, $valor);
		}
		
		/** 
		* Retorna o psf do usuario atual,
		* 
		* @return psf - de acordo com o nível de permissão
		*/
		static public function getPsfAtual(){
			
			$psf = new Psf;
			
			switch (self::getValor('nivel')){
				case 1:
					$psf = $psf->load(self::getValor('id'));
					if($psf) return $psf;
					break;
					
				case 2:
					if (TSession::getValue(self::$prefixoChaves . 'psf')) { 
						$psf = $psf->load(self::getValor('psf'));
						if($psf) return $psf;
					}
					break;
				
				default:
					die('Acesso restrito!');
					break;
			}
			return false;
		}
		
		/** 
		* Retorna o psf do usuario atual,
		* ou pela url se for o admin
		* 
		* @param TAction $action - as ações que vão passar o id do psf a frente
		* @return psf - de acordo com o nível de permissão
		
		static public function getPsfAtual($actions=NULL){
			
			$psf = new Psf;
			
			switch (self::getValor('nivel')){
				case 1:
					$psf = $psf->load(self::getValor('id'));
					if($psf) return $psf;
					break;
					
				case 2:
					if (isset($_GET['key'])) {
						$psf = $psf->load($_GET['key']);
						if($psf){
							
							if(is_array($actions)) {
								foreach($actions as $action){
									$action->setParameter('key', $_GET['key']);
								}
							}
							
							return $psf;
						}
					}
					break;
				
				default:
					die('Acesso restrito!');
					break;
			}
			return false;
		}
		*/
	}
?>