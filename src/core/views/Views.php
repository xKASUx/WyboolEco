<?php

namespace core\views;

class Views
{
    public $tmpPath;

    public function __construct(string $tmpPath)
    {
        $this->tmpPath = $tmpPath;
    }

    public function responseHtml(string $tmpName, array $arr = [], int $status = 200)
    {
        http_response_code($status);
        extract($arr);
        ob_start();
        include $this->tmpPath . '/' . $tmpName;
        $buff = ob_get_contents();
        ob_end_clean();
        echo $buff;
    }
}
