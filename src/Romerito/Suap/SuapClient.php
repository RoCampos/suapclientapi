<?php 

namespace Romerito\Suap;

use GuzzleHttp\Client as GClient;
use Romerito\Suap\SuapAPI;

class SuapClient
{    
    private $token = "";

	#guzzle client
	protected $client = null;

	protected const ENDPOINT = "https://suap.ifrn.edu.br/api/v2/";

    public function __construct()
    {
        $this->client = new GClient;
    }

    function auth($user, $password)
    {
    	$url = self::ENDPOINT . SuapAPI::AUTH;
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

    function get($url)
    {
    	$data = [];
    	$res = null;
    	if (isset($this->client)) {
    		$urlfull = self::ENDPOINT . $url;
    		$res = $this->client->request('GET', $urlfull,
    			['headers' => ['Authorization'=> 'JWT '.$this->token]
    		]);
    	}

    	if (isset($res) && $res->getStatusCode()==200) {
    		$data = json_decode($res->getBody());
    	}

    	return $data;
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