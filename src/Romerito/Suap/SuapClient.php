<?php 

namespace Romerito\Suap;

use GuzzleHttp\Client as GClient;

class SuapClient
{    
	private $token = "";
	private $user = "";
	private $password = "";

	#guzzle client
	private $client = null;

	private const ENDPOINT = "https://suap.ifrn.edu.br/api/v2/";

    public function __construct()
    {
        $this->client = new GClient;
    }

    function auth($user, $password)
    {
    	$url = self::ENDPOINT . '/autenticacao/token/';
        $param = ['form_params'=>
        	['username' => $user, 'password' => $password]
    	];

        $res = null;
        if (isset($this->client))
        	$res = $this->client->request('POST', $url, $param);

        if (isset($res) && $res->getStatusCode()==200) {
        	$data = json_decode ($res->getBody());
        	$this->token = $data->token;
        	return true;
        }
        return false;
    }

    /**
     * @return type
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param type $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param type $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return type
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return type
     */
    public function getPassword()
    {
        return $this->password;
    }
}

 ?>