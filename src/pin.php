<?php
namespace webgpio;
use PhpGpio\Gpio;

class pin{
    //TYPE OF PIN
    const OTHER =1;
    const IO    =2;
    const VCC   =3;
    const GND   =4;
    const RX    =5;
    const TX    =6;


    const OUT   ='out';
    const IN    ='in';
    
    public $number;
    public $label;
    private $type;
    private $direction;
    private $value;
    private $persistent = true;
    
    public function getGpio()
    {
        static $gpio;
        if( empty($gpio) )
            $gpio = new GPIO();
        return $gpio;
    }    
    public function __construct($number, $label,$type=self::OTHER)
    {
        $this->number = $number;
        $this->label = $label;
        $this->type = $type;
    
        return $this;
    }
    public function render()
    {
        return '<span class="pin"><span class="value'.($this->type==self::IO?' activate':'').'">'.$this->value.'</span><span class="direction'.($this->type==self::IO?' activate':'').'">'.$this->direction.'</span><span class="label">'.$this->label.'</span>'.'<span class="number">'.$this->number.'</span></span>';
    }
    public function setDirection($direction)
    {
        if( $this->type == self::IO && in_array($direction, array(self::IN, self::OUT)) )
        {
            $this->getGpio()->setup($this->number, Gpio::DIRECTION_OUT);
            $this->direction = $direction;
        }
    }
    public function getValue()
    {
        if( $this->type == self::IO && in_array($this->direction, array(self::IN, self::OUT)) )
        {
            $this->value = $this->getGpio()->input($this->number);
            return $this->value;
        }
    }
    public function setValue($valeur)
    {
        if( $this->direction == self::OUT )
        {
            $this->getGpio()->output($this->number, $valeur);
            $this->value = $valeur;
        }
    }
    public function __destruct()
    {
        $this->clean();
    }
    public function clean($force = false)
    {
        if( $this->persistent == false || $force == true)
            $this->getGpio()->unexport($this->number);
    }
}