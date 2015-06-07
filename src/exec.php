<?php 
namespace webgpio;
require_once '../vendor/autoload.php';

class exec
{
    public static function run($argc, $argv)
    {
        if ('cli' == PHP_SAPI) 
        {
            /*if ('root' !== $_SERVER['USER'] || empty($_SERVER['SUDO_USER'])) {
                echo $msg = "Please run this script as root, using sudo -t ; please check the README file";
                throw new \Exception($msg);
            }*/
            $_REQUEST = json_decode(base64_decode($argv[1]), true);
            foreach( $_REQUEST['pins'] as $pin_json)
            {
                
                $pin_array = json_decode($pin_json, true);
                $pin = new pin($pin_array['number'],$pin_array['label'], $pin_array['type']);
                $pin->setDirection($pin_array['direction']);
                $pin->setValue($pin_array['value']);
                sleep(1);
                $pin->setValue((int)!$pin_array['value']);
                sleep(1);
                $pin->__destruct();
            }
        }
        else
        {
            echo json_encode($_REQUEST);
            //var_dump('sudo php '.__FILE__.' "'.(isset($_REQUEST['q'])?$_REQUEST['q']:'salut').'"');
            exec('sudo php '.__FILE__.' "'.(isset($_REQUEST)?base64_encode (json_encode($_REQUEST)):'').'" ', $a);
            echo '<pre>';var_dump($a);
        
        }
    }
}
exec::run(isset($argc)?$argc:'',isset($argv)?$argv:'');