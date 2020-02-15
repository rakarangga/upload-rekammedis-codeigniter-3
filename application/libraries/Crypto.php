<?php
/*
** Crypt
** This class can encrypt a text using De Vigen�re Encyption square
** It uses an extended alphabet that allow you to use also other 
** chars that are not included in the original De Vigen�re square.
**
** Author: Nicola Mustone
** Date: 07 February 2011
** Version 1.0
**
** Copyright (c) 2011 Nicola Mustone
** License: GPL
** http://www.opensource.org/licenses/gpl-license.html
** license.txt
**
*/
 
class Crypto{
	private $alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N', 'O','P','Q','R','S','T','U','V','W','X','Y','Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	private $matrix = array();
	private $key = array();

	# public __construct
    #
    # parameters
    # string @key
    #   The key you want to use for encrypt your text
    #
	public function __construct($key) {
		$this->key = $this->makeKey($key['key']);
		
        
        for($x = 0; $x < strlen($this->key); $x++) {
                $start_position = array_search($this->key[$x], $this->alphabet);
                $array1 = array_slice($this->alphabet, $start_position, count($this->alphabet));
                $array2 = array_slice($this->alphabet, 0, $start_position);
                $matrix[$x] = array_merge($array1, $array2);
        }
        
        $this->matrix = $matrix;
        // echo $key['key'];
	}

	# public printTable
    #
    #   Prints a table that contain all alphabets used for encrypt your text
    #
	public function printTable(){
		echo "<table border='1' cellpadding='1' cellspacing='0'>
		<tr><td rowspan='2' colspan='2'>&nbsp;</td>";
        for($i=0; $i<count($this->alphabet); $i++) {
            echo"<td align='center'><b>$i</b></td>";
        }
        echo "</tr>";
        echo "<tr>";
        for($i=0; $i<count($this->alphabet); $i++) {
            echo"<td align='center'><b>". $this->alphabet[$i] ."</b></td>";
        }
            
        echo "</tr>";
		for($i=0; $i<strlen($this->key); $i++){
			echo "<tr><td><b>$i</b></td><td><b>". $this->matrix[$i][0] ."</b></td>";
			for($j=0; $j<count($this->alphabet); $j++){
				echo "<td align='center'>".$this->matrix[$i][$j]."</td>";
			}
			echo "</tr>";
		}
        echo "</table>";
      
	}

	# public encrypt
    #
    # parameters
    # string @txt_o
    #   The text you want to encrypt
    #
    # Returns an encoded string
    #
	public function encrypt($txt_o){
        $txt_c = '';
        $txt_o = str_replace(array(" ",".",",",";",":","�","�","�","�","�","�"),
                            array('SP','STOP','VIR','DOTVR', '2DT', 'aGR','eGR','eAC','iGR','oGR','uGR'), 
                                $txt_o);
		for($i = 0; $i < strlen($txt_o); $i++) {
            $char = substr($txt_o, $i, 1);
                $original_position = array_search($char, $this->alphabet);
                // $txt_c .= $this->matrix[$i % strlen($this->key)][$original_position];
                $val = intval($i % strlen($this->key));
                $txt_c .= $this->matrix[$val][$original_position];
        }
        
        return $txt_c;
	}

	# public decrypt
    #
    # parameters
    # string @txt_c
    #   The text you want to decrypt
    #
    # Returns a decoded string
    #
	function decrypt($txt_c){
		$txt_o = "";
		
        $k = 0;
        for($i = 0; $i < strlen($txt_c); $i++) {
            $char_c = substr($txt_c, $i, 1);
            
                $position_c = array_search($char_c, $this->matrix[$k]);

                $txt_o .= $this->alphabet[$position_c];
            
            if($k == strlen($this->key) -1)
                $k = 0;
            else
                $k++;
        }
        
        $txt_o = str_replace(array('SP','STOP','VIR','DOTVR', '2DT', 'aGR','eGR','eAC','iGR','oGR','uGR'), array(" ",".",",",";",":","�","�","�","�","�","�"), $txt_o);
        
        return $txt_o;
	}
    
    # private makeKey
    #
    # parameters
    # string @key
    #   the string you would to use as encryption key
    #
    # Returns the new key
    #
    private function makeKey($key) {
        $key = str_replace(array(" ",".",",",";"),"", $key);
        $array = array();
        for($i = 0; $i < strlen($key); $i++) {
            $char = substr($key, $i, 1);
            if(!in_array($char, $array))
                array_push($array, $char);
            else
                continue;
        }
        
        $key = '';
        for($i = 0; $i < count($array); $i++)
            $key .= $array[$i];
        
        return $key;
    }
}
?>