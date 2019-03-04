<?php

namespace NexmoPhp\Client;

class Messages
{
    public $from;
    public $to;

    public $message = [
        "content"=>[
            "type" => "",
            "text" => ""
        ]
    ];

    public function whatsapp(){
        $this->setStandard();
        $this->from["type"] = "whatsapp";
        $this->to["type"] = "whatsapp";
    }

    public function sms(){
        $this->setStandard();
        $this->from["type"] = "sms";
        $this->to["type"] = "sms";
    }

    public function viber(){
        $this->setStandard();
        $this->from["type"] = "viber";
        $this->to["type"] = "viber";
    }

    public function messenger(){
        $this->setFb();
        $this->from["type"] = "messenger";
        $this->to["type"] = "messenger";
    }

    public function setStandard(){
        $this->from = [
            "type"=>"",
            "number"=>""
        ];
        $this->to = [
            "type"=>"",
            "number"=>""
        ];
    }

    public function setFb(){
        $this->from = [
            "type"=>"",
            "id"=>""
        ];
        $this->to = [
            "type"=>"",
            "id"=>""
        ];
    }

    public function setFrom($from){
        if($this->from["type"]!="messenger"){
            $this->from["number"] = $from;
        }else{
            $this->from["id"] = $from;
        }
    }

    public function setTo($to){
        if($this->to["type"]!="messenger"){
            $this->to["number"] = $to;
        }else{
            $this->to["id"] = $to;
        }
    }

    public function message($type, $text){
        if($type=="text"){
            $this->message["content"]["type"] = $type;
            $this->message["content"]["text"] = $text;
        }
    }

    public function __invoke()
    {
        return ["from" => $this->from, "to" =>$this->to, "message" => $this->message];
    }

}
