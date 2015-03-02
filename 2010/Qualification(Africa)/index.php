<?php

class GoogleCodeJam
{
    protected $content;
    protected $filename;
    
    public function __construct($filename) {
        $this->filename = "A-large-practice.out";
        $this->content = $this->getContentFile($filename);
    }
    
    public function getContentFile($filename){
        return file($filename);
    }
    
    public function execute(){
        for($i = 1; $i < count($this->content) - 1; $i = $i + 3){
            $Case = array_slice($this->content, $i, 3);
            $Sum = $Case[0];
            $Arr = explode(" ", $Case[2]);
            for($num1 = 0; $num1 < count($Arr); $num1++){
                for($num2 = $num1 + 1; $num2 < count($Arr); $num2++){
                    if($Arr[$num2] + $Arr[$num1] == $Sum){
                        $Found[] = ($num1+1).' '.($num2 + 1);
                        break;
                    }
                }
            }
        }
        $this->display($Found);
    }
    
    public function display($result){
        $Output = "";
        foreach($result as $key => $val){
            $Output .= "Case #".($key+1).": ".(is_array($val) ? $val[0] : $val)."\n";
        }
        file_put_contents("Output/".$this->filename, $Output);
        //echo "Memory usage: ".memory_get_usage();
    }
}
$t = new GoogleCodeJam("Input/A-large-practice.in");
$t->execute();
?>
