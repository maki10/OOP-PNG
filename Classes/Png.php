<?php

class CreatePNG
{

	protected $_image;
	protected $_open;
	
	public function __construct($img)
	{
		header ('Content-Type: image/png');
		$this->_image = $img;
		$this->_open  = @imagecreatefrompng($img);
		if($this->_open == true){
			$this->Start();
		}else{
			$this->Error($img);
		}
	}
	
	/*
	*	Public Error
	*	If image doesn't exist open error image
	*	and add error string where you try to open image
	*/
		
	public function Error($img)
	{
		$this->_open = @imagecreatetruecolor(600, 70)
		or die('Cannot Initialize new GD image stream');
		$text_color = imagecolorallocate($this->_open, 255, 255, 255);
		imagestring($this->_open, 10, 25, 25,  'Error image not exist in: '. $img, $text_color);
		imagepng($this->_open);
		imagedestroy($this->_open);
	}
	
	/*
	*	Public Start
	*	Start adding some stufs on image and save it in folder
	*/
	
	public function Start()
	{
		$this->Signature();
		$save = 'image/new/maki10.png';
		imagepng($this->_open, $save, NULL, 9);
		imagedestroy($this->_open);
	}
	
	/*
	*	Public Signature
	*	Add text signature on image
	*/

	public function Signature()
	{
		$tcolor = imagecolorallocate($this->_open, 0, 0, 0);
		imagestring($this->_open, 20, 700, 260, 'By maki10', $tcolor);
	}
	
	/*
	*	Public Open
	*	Open saved images in specific folder
	*/
	
	public function Open()
	{
		$save = @imagecreatefrompng('image/new/maki10.png');
		imagepng($save);
		imagedestroy($save);
	}
	
	/*
	*	Public Add
	*	Add some stuff to your image
	*	$this->_open Destination image link resource.
	*	$sec_image Source image link resource.
	*	$int_1 x-coordinate of destination point.
	*	$int_2 y-coordinate of destination point.
	*	$int_3 x-coordinate of source point.
	*	$int_4 y-coordinate of source point.
	*	$int_5 Source width.
	*	$int_6 Source height.
	*/
	
	public function Add($sec_image, $int_1, $int_2, $int_3, $int_4, $int_5, $int_6)
	{
		$sec_img = @imagecreatefrompng($sec_image);
		if($sec_img == true){
		$this->_open  = @imagecreatefrompng($this->_image);
		imagecopy($this->_open, $sec_img, $int_1, $int_2, $int_3, $int_4, $int_5, $int_6);
		$this->Start();
		imagedestroy($sec_img);
		}else{
			$this->Error($sec_image);
		}
	}
	
	
}
