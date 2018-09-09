<?php 

namespace Romerito\Suap;

use GuzzleHttp\Client as GClient;
use Romerito\Suap\SuapAPI;

/**
 *  This class represents a php client for [SUAP API]
 * (https://bit.ly/2N10jvW).
 * 
 *  It represents a general client that supports authentication call * and general GET requests. Its purpose is provide a way to access
 * SUAP API and to be used for more especific calls that are offered * by the original API implementation.
 * 
 * @author Romerito C. Andrade <romerito.campos@gmail.com>
 * @version 0.2
 */
class SuapClient
{    
    /**
     * 
     * @var string token generated for access by an authorized user.
     * 
     */
    private $token = "";

	/**
     * 
     * @var GuzzleHttp\Client guzzleHttp client used to call SUAP API.
     * 
     */
	protected $client = null;

    /**
     * 
     * @const string endpoint used to make calls to SUAP API. 
     * 
     */
	protected const ENDPOINT = "https://suap.ifrn.edu.br/api/v2/";


    /**
     * 
     * The construction funciont only creates the Guzzle instance.
     * 
     */
    public function __construct()
    {
        $this->client = new GClient;
    }


    /**
     * 
     * This function is used to perform the auuthorization process
     * on the SUAP API. It receives two arguments: $user and 
     * @password. 
     * 
     * Every professional and student has one account to access SUAP * API. This credentials are used to get access.
     * 
     * If the request were successfully performed, a token is return
     * by the call to SUAP API. This information is hold in memory 
     * by the SuapClient object.
     * 
     * @param string $user the username of the student/professional.
     * @param string $password the secret key of student/professional.
     * 
     * @return boolean the result of authorization process - true or false.
     */
    public function auth($user, $password)
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


    /**
     * 
     * This function is used to perform get request using the SUAP API
     * 
     * It receives the url (part of) to access the SUAP API. This url
     * is concatenated with the ENDPOINT constant defined in 
     * the class.
     * 
     * @param string url provided by the api. 
     * 
     * @return array the response from the call.
     */
    public function get($url)
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
     * 
     * Access method to recover token.
     * 
     * @return string token from the current session.
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * 
     * Redefines the username.
     * 
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * 
     * Redefines the password.
     * 
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * 
     * Obtains the username of the 
     * current SUAP API client.
     * 
     * @return string username.
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * 
     * Obtains the password of the 
     * current SUAP API client.
     * 
     * @return string password.
     */
    public function getPassword()
    {
        return $this->password;
    }
}

 ?>