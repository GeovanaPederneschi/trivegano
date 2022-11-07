<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    // var PHPMAILER
    private $email;

    // var stdClass
    private $data;

    // var Exception
    private $erro;

    public function __construct()
    {
        $this->email = new PHPMailer(exceptions:true);
        $this->data = new stdClass();

        $this->email->isSMTP();
        $this->email->isHTML();
        $this->email->setLanguage(langcode:"br");

        $this->email->SMTPAuth = true;
        $this->email->SMTPSecure = '';
        $this->email->CharSet = "utf-8";

        $this->email->Host = MAIL['host'];
        $this->email->Port = MAIL['port'];
        $this->email->Username = MAIL['user'];
        $this->email->Password = MAIL['password'];
    }

    public function add(string $subject, string $body, string $recipient_name, string $recipient_email) : Email
    {
       $this->data->subject = $subject;
       $this->data->body = $body;
       $this->data->recipient_name = $recipient_name;
       $this->data->recipient_email = $recipient_email;
       return $this;

    }

    public function attach(string $filePath, string $fileName) 
    {
        $this->data->attach[$filePath] = $fileName;
    }

    public function send(string $from_name = MAIL['from_name'], string $from_email= MAIL['from_email']) : bool
    {
        try{
            $this->email->Subject = $this->data->subject;
            $this->email->msgHTML($this->data->body);
            $this->email->addAddress($this->data->recipiente_email, $this->data->recipient_name);
            $this->email->setFrom($from_email,$from_name);
            
            if(!empty($this->data->attach)){
                foreach($this->data->attach as $path => $name){
                    $this->email->addAttachment($path,$name);
                }
            }

            $this->email->send();
        }catch(Exception $exception){
            $this->erro = $exception;
            return false;
        }
    }

    public function error() : ?Exception
    {
        return $this->error;
    }



}


?>