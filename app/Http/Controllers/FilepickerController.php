<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use Hazzard\Filepicker\Handler;
use Hazzard\Filepicker\Uploader;
use Intervention\Image\ImageManager;
use Hazzard\Config\Repository as Config;
use File;

class FilepickerController extends BaseController
{
    /**
     * @var \Hazzard\Filepicker\Handler
     */
    protected $handler;
    protected $userId;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->handler = new Handler(
            new Uploader($config = new Config, new ImageManager)
        );
        $config['max_file_size'] = 2097152; //en bytes
        $config['upload_dir'] =  public_path('img/propiedades');//$config['upload_dir'] =   __DIR__ . '/../../../../public_html/img/propiedades';
        $config['upload_url'] = url('/img/propiedades');//$config['upload_url'] = url('img/propiedades');
        $config['accept_file_types'] = 'jpg|jpeg|png|gif';
        $config['debug'] = config('app.debug');
        $config['keep_original_image'] = true;
        $config['overwrite '] = true;
        $config['image_versions.thumb'] = array(
            'width' => 350,
            'height' => 200
        );

        //dd($config);exit;
    }

    /**
     * Handle an incoming HTTP request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request)
    {
       // Events

        /**
         * Fired before the file upload starts.
         *
         * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
         */
        $this->handler->on('upload.before', function ($file) {
            $file->save = rand(0,99999).time();
            // throw new \Hazzard\Filepicker\Exception\AbortException('Error message!');
        });

        /**
         * Fired on upload success.
         *
         * @param \Symfony\Component\HttpFoundation\File\File $file
         */
        $this->handler->on('upload.success', function ($file) {
        });

        /**
         * Fired on upload error.
         *
         * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
         */
        $this->handler->on('upload.error', function ($file) {

        });

        /**
         * Fired when fetching files.
         *
         * @param array &$files
         */
        $this->handler->on('files.fetch', function (&$files) {
            // Set the array of files to be returned.
            // $files = array('file1', 'file2', 'file3');
        });

        /**
         * Fired on file filtering.
         *
         * @param array &$files
         * @param int   &$total
         */
        $this->handler->on('files.filter', function (&$files, &$total) {

        });

        /**
         * Fired on file download.
         *
         * @param \Symfony\Component\HttpFoundation\File\File $file
         * @param string $version
         */
        $this->handler->on('file.download', function ($file, $version) {

        });

        /**
         * Fired on file deletion.
         *
         * @param \Symfony\Component\HttpFoundation\File\File $file
         */
        $this->handler->on('file.delete', function ($file) {

        });

        /**
         * Fired before cropping.
         *
         * @param \Symfony\Component\HttpFoundation\File\File $file
         * @param \Intervention\Image\Image $image
         */
        $this->handler->on('crop.before', function ($file, $image) {

        });

        /**
         * Fired after cropping.
         *
         * @param \Symfony\Component\HttpFoundation\File\File $file
         * @param \Intervention\Image\Image $image
         */
        $this->handler->on('crop.after', function ($file, $image) {

        });


        return $this->handler->handle($request);
    }

    public function deleteImg(Request $request)
    {
        if ($request->ajax()) {
            $data=$request->all();

            $path = 'public/img/propiedades/';
            File::delete($path . $data['nombre']);
            $path = 'public/img/propiedades/thumb/';
            File::delete($path . $data['nombre']);
        }
    }
}