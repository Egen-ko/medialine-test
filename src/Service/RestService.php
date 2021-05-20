<?php
/**
 * Created by PhpStorm.
 * User: Egen
 * Date: 20.05.2021
 * Time: 7:29
 */

namespace App\Service;


use App\Model\Options;
use App\Model\Service;
use Curl\Curl;

class RestService implements Service
{
    /**
     * HttpService constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /** @var  string */
    private $url;

    public function getOptions(): Options
    {
        $curl = new Curl();
        $curl->get($this->url);

        if ($curl->error) {
            throw new \Exception(sprintf('http error: %s', $curl->error_code));
        }
        else {
            return  $this->responseToOptions($curl->response);
        }
    }

    public function setOptions(Options $options): void
    {
        $curl->post($this->url, json_encode(['options' => $options->getOptions()]));

        if ($curl->error) {
            throw new \Exception(sprintf('http error: %s', $curl->error_code));
        }
    }

    private function responseToOptions(string $response): Options
    {
        return (new Options())->setOptions(json_decode($response)['options']);
    }

}