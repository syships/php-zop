<?php
namespace zop;

class ZopRequest
{
    private $url;
    private $params = Array();
    private $body;

    public function addParam($k, $v)
    {
        $this->params += [$k => $v];
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function setData($data)
    {
        $this->params = json_decode($data);
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getBody()
    {
        return $this->body;
    }



    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }


}