<?php
	class Photoupload{
	private $tempName;
	private $imageFileType;
	private $myTempImage;
	private $myImage;
	
		//constructor, mis käivitub klassi kasutuselevõtmisele
		function __construct($tmpPic, $type) {
			$this->tempName = $tmPic;
			$this->imageFileType = $type;
			$this->createImageFromFile();
		}
		
		//destructor, mis käivitub classi eemaldamisel
		function __destruct(){
			imagedestroy($this->myTempImage);
			imagedestroy($this->myImage);
		}
		
		private function createImageFromFile(){
			if($this->imageFileType == "jpg" or $this->imageFileType == "jpeg") {
				$this->myTempImage = imagecreatefromjpeg($_FILES["fileToUpload"]["tmp_name"]);
			}
			if($this->imageFileType == "gif") {
				$this->myTempImage = imagecreatefromgif($_FILES["fileToUpload"]["tmp_name"]);
			}
			if($this->imageFileType == "png") {
				$this->myTempImage = imagecreatefrompng($_FILES["fileToUpload"]["tmp _name"]);
			}
		}
		
		public function resizeImage($width, $height)  {
			//vaatame pildi orginaalsuuruses
			$imageWidth = imagesx($this->myTempImage);
			$imageHeight = imagesy($this->myTempImage);
			//leian vajaliku suurendusfaktori
			if ($imageWidth > $imageHeight){
				$sizeRatio = $imageWidth / $width;
			} else {
				$sizeRatio = $imageHeight / $height;
			}
			
			$newWidth = round($imageWidth / $sizeRatio);
			$newHeight = round($imageHeight / $sizeRatio);
			$this->myImage = $this->changePicSize($this->myTempImage, $imageWidth, $imageHeight, $newWidth, $newHeight);
		}
		function changePicSize($image, $ow, $oh, $w, $h) {
			$newImage = imagecreatetruecolor($w, $h);
			imagecopyresampled($newImagem $image, 0, 0, 0, 0, $w, $h, $ow, $oh);
			return $newImage;
		}
		
		public function addWaterMark(){
			$waterMark = imagecreatefrompng("../../vp_picfiles/vp_logo_w100_overlay.png");
			$waterMarkWidth = imagesx($waterMark);
			$waterMarkHeight = imagesy($waterMark);
			$waterMarkPosX = imagesx($this->myImage) - $waterMarkWidth - 10;
			$waterMarkPosY = imagesy($this->myImage) - $waterMarkHeight - 10;
			//kopeerin vesimärgi pikslid pildile
			imagecopy($this->myImage, $waterMark, $waterMarkPosX, $waterMarkPosY, 0, 0, $waterMarkWidth, $waterMarkHeight);
		}
		
		public function addText(){
			//lisame ka teksti
			$textToImage = "X";
			$textColor = imagecolorallocatealpha($this->myImage, 255, 255, 255, 60);
			//alpha on 0-127
			imagettftext($this->myImage, 20, -45, 10, 25, $textcolor, "../vp_picfiles/ARIALBD.TTF")
		}
		
		public function savePhoto($targetFile){
			notice = "";
			//muudetud suurusega fail kirjutatakse pildifailiks
			if($this->imageFileType == "jpg" or $imageFileType == "jpeg") {
				if(imagejpeg($this->myImage, $target_file, 90)){
					$notice = 1;
				} else {
					$notice = 0;
				}
			}
			if($this->imageFileType == "png") {
				if(imagejpeg($this->myImage, $target_file, 90)){
					$notice = 1;
				} else {
					$notice = 0;
				}
			}
			if($this->imageFileType == "gif") {
				if(imagejpeg($this->myImage, $target_file, 90)){
					$notice = 1;
				} else {
					$notice = 0;
				}
			}
			
			return $notice
	}//class lõppeb
?>