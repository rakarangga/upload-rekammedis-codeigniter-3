<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "vendor/autoload.php";
/**
 * Picqer Barcode for CodeIgniter 3.x
 *
 * Library for Picqer Barcode It helps the user to print the barcode
 * in CodeIgniter application.
 *
 * This library requires the vendor/ and it should be placed in libraries folder.
 *
 *
 * @package     CodeIgniter
 * @category    Libraries
 * @author      rcubic
 * @version     3.0
 */
Class Barcode
{
    public function __construct(){
        
    }
  /*  public static  $_type;
    
    public function __construct(){
        $barPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
        $barSVG = new Picqer\Barcode\BarcodeGeneratorSVG();
        $barHTML = new Picqer\Barcode\BarcodeGeneratorHTML();
        $code = $this->getBarcodeHTML($barHTML,'a');
        echo $code;
    }
    
    public function getBarcodeHTML($obj,$string){
        return $obj->getBarcode($string,$obj::$this->getType());
    }
    
    public function getType($type = 'TYPE_CODE_128') {
       return static::$type;
       //  $this->$type;
    } */
}
   
    
