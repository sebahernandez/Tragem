<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Response;
use Image;

class ImagenController extends Controller
{
	private $path_img;
	private $path_thumb;
	private $file;
	private $height;
	private $weight;

	public function __construct($file,$path_img,$path_thumb,$h,$w)
    {
    	$this->file = $file;
    	$this->path_img = $path_img;
    	$this->path_thumb = $path_thumb;
    	$this->height = $h;
    	$this->weight = $w;

        $this->upload();
    }

    private function upload()
    {
        $image = \Image::make($this->file);
       
        $path = public_path().$this->path_img;

        $image->save($path.$this->file->getClientOriginalName());
       
        $image->resize($this->height,$this->weight);
        
        $path = public_path().$this->path_thumb;

        $image->save($path.'thumb_'.$this->file->getClientOriginalName());
    }
}