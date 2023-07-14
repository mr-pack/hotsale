<?php

class Logger
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }
    
    private function Filename() {
        return 'log.txt';
    }


    public function Log($message)
    {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[$timestamp] $message" . PHP_EOL;
        if(!file_exists($this->path)){
            mkdir($this->path, 0777, true);        
        }
        $path = $this->path . '/' . $this->Filename();
        file_put_contents($path, $logMessage, FILE_APPEND);
    }
}
