<?php 
    namespace Vendor\Log; 
    use Vendor\Log\Logger; 
    class LoggerXML extends Logger{
        public function write($message)
        {
            date_default_timezone_set('America/Sao_Paulo');
            $time = date('Y-m-d h:i:s');
            $text = "<log>";
            $text = "<time>$time</time>";
            $text = "<message>$message</message>";
            $text = "</log>"; 

            $handler = fopen($this->filename,'a'); 
            fwrite($handler,$text); 
            fclose($handler); 
        }
    }
