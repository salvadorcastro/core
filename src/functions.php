<?php
use Symfony\Component\Finder\Finder;
//Cargamos en memoria la función de desarrollo PRE
if (!function_exists('pre')) {
    function pre($var, $die = FALSE)
    {
        $html = '<pre style="padding:10px;margin:0;display:block;background: #EEE; box-shadow: inset 0 0 3px 3px #DDD; color: #666; text-shadow: 1px 1px 1px #CCC;border-radius: 5px;">';
        $html .= (is_null($var)) ? '<b>NULL</b>' : print_r($var, TRUE);
        $html .= '</pre>';
        ob_start();
        echo $html;
        ob_flush();
        ob_end_clean();
        if ($die) {
            die;
        }
    }
}

if (!function_exists('jpre')) {
    function jpre($var, $die = false)
    {
        echo json_encode($var, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        if ($die) {
            die;
        }
    }
}

if (!function_exists("getallheaders")) {
    function getallheaders()
    {
        $headers = array();
        foreach ($_SERVER as $h => $v)
            if (preg_match('/HTTP_(.+)/', $h, $hp))
                $headers[$hp[1]] = $v;
        return $headers;
    }
}

if (file_exists(CORE_DIR)) {
    //Autoload de módulos
    $finder = new Finder();
    $finder->files()->in(CORE_DIR)->name('autoload.php');
    /* @var $file SplFileInfo */
    foreach ($finder as $file) {
        $path = $file->getRealPath();
        include_once($path);
    }
}