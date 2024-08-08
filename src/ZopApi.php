<?php
namespace syships\zop;

class ZopApi
{
    public $serverUrl;
    public $action;
    public $data;
    public $errors = [];
    private $companyId = "4fcf58d7f359f05b643a7";//todo 从配置文件获取
    private $key = "78bdd4970c57b71b82c62072f700b654";//todo 从配置文件获取

    public function __construct($action='', $data=[],$serverUrl='http://japi-test.zto.com/'){
        $this->serverUrl = $serverUrl;
        $this->action = $action;
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        //todo 验证传参

        return true;
    }

    /**
     * @return bool|string
     */
    public function send()
    {
        if(!$this->validate()){
            return false;
        }
        $properties = new ZopProperties($this->companyId, $this->key);
        $client = new ZopClient($properties);
        $request = new ZopRequest();
        $request->setUrl($this->serverUrl.$this->action);
        $request->setData(json_encode($this->data));
        $res = $client->execute($request);
        return $res;
    }
}
