<?php


namespace App\Http\services;

use App\Constants;
use App\Models\ProfileModel;
use GuzzleHttp\Client;

class APIService
{

    private $connector;


    public function __construct()
    {
        $this->connector = new Client();
    }

    private function doGet($url, $headers = array(), $params = array())
    {
        $client = new Client();
        $res = $client->request('GET', $url, [
            'headers' => $headers
        ]);
        if ($res->getStatusCode() == 200 || $res->getStatusCode() == 201) {
            return $res->getBody();
        } else {
            throw new \Exception($res->getBody(), $res->getStatusCode());
        }
    }

    private function doPost($url, $headers = array(), $body = array())
    {
        $client = new Client();
        $res = $client->request('POST', $url, [
            'headers' => $headers,
        ]);
        if ($res->getStatusCode() == 200 || $res->getStatusCode() == 201) {
            return $res->getBody();
        } else {
            throw new \Exception($res->getBody(), $res->getStatusCode());
        }
    }


    /**
     * @param string $user
     * @return ProfileModel
     * @throws \Exception
     */
    public function getProfile($user = null)
    {
        if ($user == null) {
            $user = Constants::$USERNAME;
        }
        $response = $this->doGet(sprintf(Constants::$PROFILE, $user));
        return new ProfileModel(json_decode($response));
    }

    /**
     * @param null $user
     * @return mixed
     * @throws \Exception
     */
    public function getNetwork($user = null)
    {
        if ($user == null) {
            $user = Constants::$USERNAME;
        }
        $response = $this->doGet(sprintf(Constants::$NETWORK, $user));
        $data = json_decode($response);
        return $data->graph->nodes;
    }

    /**
     * @param int $size
     * @param int $offset
     * @return mixed
     * @throws \Exception
     */
    public function getOpportunities($size = 20, $offset = 0)
    {
        $response = $this->doPost(sprintf(Constants::$OPPORTUNITIES, $offset, $size));
        $data = json_decode($response);
        return $data;
    }

    /**
     * @param string $id
     * @return mixed
     * @throws \Exception
     */
    public function getOpportunity(string $id)
    {
        $response = $this->doGet(sprintf(Constants::$SHOW_OPPORTUNITY, $id));
        $data = json_decode($response);
        return $data;
    }

    /**
     * @param int $size
     * @param int $offset
     * @return mixed
     * @throws \Exception
     */
    public function getPeople($size = 20, $offset = 0)
    {
        $response = $this->doPost(sprintf(Constants::$PEOPLE, $offset, $size));
        $data = json_decode($response);
        return $data;
    }

}