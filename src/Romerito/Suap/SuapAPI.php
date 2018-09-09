<?php 

namespace Romerito\Suap;

/**
 * 
 * This class is used to map url`s of the SUAP API to constants.
 * 
 * Each url with an implementation in this project has an constant defined.
 * 
 * @author Romerito C. Andrade <romerito.campos@gmail.com>
 * 
 */
class SuapAPI
{

	/**
	 *
	 * URL to get access token.
	 * 
	 * @const string
	 *  
	 */
    const AUTH = "/autenticacao/token/";

    /**
	 *
	 * URL to get personal information of an authorized user, 
	 * using his credentials to obtain a token.
	 * 
	 * @const string
	 *  
	 */
    const MYDATA = "/minhas-informacoes/meus-dados/";

    /**
	 *
	 * URL to get an specific School Register Book of a professor.
	 * 
	 * @const string
	 *  
	 */
    const SRBOOK= "/minhas-informacoes/meu-diario/";

    /**
	 *
	 * URL to get all School Register Books of a professor.
	 * 
	 * @const string
	 *  
	 */
    const SRBOOKS= "/minhas-informacoes/meus-diarios/";
}




 ?>
