<?php
/**
 * @Creator Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Author: Alexey Kutuzov <lexus27.khv@gmai.com>
 * @Project: ceive.data-validation
 */





class Mailbox{

    public $host = 'pop.gmail.com';
    public $port = '993';

    public $username;
    public $password;

    public $connection;

    public $header;
    public $msgCount = 0;

    public function __construct($host, $port, $username, $password)
    {

        $this->host = $host;
        $this->port = $port;

        $this->username = $username;
        $this->password = $password;


        $this->connection = imap_open( "{" . $host . ":" . $port . "/novalidate-cert}INBOX", $username, $password );
        if (!$this->connection) {
            imap_last_error();
        };

        $this->header = imap_check($this->connection);
        if($this->header){
            $this->msgCount = $this->header->Nmsgs;
        }

    }

    public function getMessages(){

        $result = imap_search($this->connection, 'UNSEEN');
        foreach($result as $email_number) {

            /* get information specific to this email */
            $overview = imap_fetch_overview($this->connection,$email_number,0);
            $message = imap_fetchbody($this->connection,$email_number,2);
            $structure = imap_fetchstructure($this->connection,$email_number);

            $seen = $overview[0]->seen;
            $subject = $overview[0]->subject;
            $from = $overview[0]->from;
            $date = $overview[0]->date;

            $attachments = [];

            if(isset($structure->parts) && count($structure->parts)) {

                for($i = 0; $i < count($structure->parts); $i++) {

                    $attachments[$i] = array(
                        'is_attachment' => false,
                        'filename'      => '',
                        'name'          => '',
                        'attachment'    => ''
                    );

                    if($structure->parts[$i]->ifdparameters) {
                        foreach($structure->parts[$i]->dparameters as $object) {
                            if(strtolower($object->attribute) == 'filename') {
                                $attachments[$i]['is_attachment'] = true;
                                $attachments[$i]['filename'] = $object->value;
                            }
                        }
                    }

                    if($structure->parts[$i]->ifparameters) {
                        foreach($structure->parts[$i]->parameters as $object) {
                            if(strtolower($object->attribute) == 'name') {
                                $attachments[$i]['is_attachment'] = true;
                                $attachments[$i]['name'] = $object->value;
                            }
                        }
                    }

                    if($attachments[$i]['is_attachment']) {
                        $attachments[$i]['attachment'] = imap_fetchbody($this->connection, $email_number, $i+1);
                        if($structure->parts[$i]->encoding == 3) { // 3 = BASE64
                            $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                        }
                        elseif($structure->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
                            $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                        }
                    }
                }

                $_attachments = [];
                foreach($attachments as $i => $a){

                    $_attachments = new Attachment($a['name'], $a['filename'], $a['attachment']);

                }
                $attachments = $_attachments;
            }

            $_m = new Message($subject, $from, $date, $message, $attachments);
            $_m->seen = $seen;
            $messages[] = $_m;
        }

    }

}

class Attachment{

    public $name;

    public $filename;

    public $body;


    public function __construct($name, $filename, $body)
    {

        $this->name = $name;
        $this->filename = $filename;
        $this->body = $body;
    }

    public function __toString()
    {
        return $this->body;
    }

}

class Message{

    public $seen = false;

    public $subject;

    public $from;

    public $date;

    public $body;

    public $attachments = [];

    public function __construct($subject, $from, $date, $body, $attachments = [])
    {

        $this->subject = $subject;
        $this->from = $from;
        $this->date = $date;
        $this->body = $body;
        $this->attachments = $attachments;
    }

}




$mailbox = new Mailbox('imap.gmail.com', 993, 'lexus27.khv@gmail.com', '@JungleTechLabs2017@');


$messages = $mailbox->getMessages();

foreach($messages as $msg){

}