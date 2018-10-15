
<?php

require_once "vendor/autoload.php";
use thiagoalessio\TesseractOCR\TesseractOCR;
echo (new TesseractOCR('example.png'))
    	//->executable('C:\Program Files (x86)\Tesseract-OCR\tesseract.exe')
    ->run();
?>