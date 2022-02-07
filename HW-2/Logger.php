<?php

define('BASE_DIR', __DIR__);

class Logger {
    private $path = __DIR__ . '/log/';
    private $type = 'date';
    private $name = 'log';
    private $extension = '.log';
    private $fullPath;
    private $file;

    public function __construct() {
        $folder = $this->path;

        if (!file_exists($folder)) {
            mkdir($folder);
            chmod($folder, 0777);
        }

        if ($this->type === 'date') {
            $this->name = date("Y-m-d");
        }

        $this->fullPath = $folder . $this->name . $this->extension;
        $this->file = fopen($this->fullPath, "a");
    }

    public function write($level, $message) {
        $line = '[' . date("Y-m-d H:i:s", time()) . '] ';
        $line .= strtoupper($level) . ' ';
        $line .= $message . PHP_EOL;

        return fwrite($this->file, $line);
    }

    public function error($message) {
        return $this->write('ERROR', $message);
    }

    public function warning($message) {
        return $this->write('WARNING', $message);
    }

    public function debug($message) {
        return $this->write('DEBUG', $message);
    }

    public function critical($message) {
        return $this->write('CRITICAL', $message);
    }

    public function __destruct() {
        fclose($this->file);
    }
}
