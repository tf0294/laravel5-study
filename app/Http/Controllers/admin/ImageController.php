<?php
/**
 *
 */
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Component\AdminTrait;
use App\Http\Requests;
use App\Http\Requests\Admin\ImageComplateRequest;
use App\Http\Requests\Admin\ImageEditComplateRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Image;
use Component\AdminInterface;
use Carbon\Carbon;

class ImageController extends AdminController implements AdminInterface
{
    use AdminTrait;
    protected static $model = 'Image';
    protected static $view = 'image';

      /**
       * 新規登録完了
       * @see http://api.symfony.com/2.7/Symfony/Component/HttpFoundation/File/UploadedFile.html
       *
       * @param ImageComplateRequest $request
       */
       public function complate(ImageComplateRequest $request)
       {
           try {
               if (! $request->hasFile('data')
                  || ! $request->file('data')->isValid()) {
                      throw new Exception("Image Data Upload Failed.");
               }

               $dat = self::getBinary($request->file('data'));
               $name = md5(sha1(uniqid(mt_rand(),true))) . $request->file('data')->getClientOriginalName();
               /*
                $upload = $request->file('data')->move('media', $name);
               */

               $images = Image::insert([
                   'name' => $request->name,
                   'original_name' => $request->file('data')->getClientOriginalName(),
                   'publish_name' => $name,
                   'mime_type' => $request->file('data')->getMimeType(),
                   'filesize' => $request->file('data')->getClientSize(),
                   'data' => $dat,
               ]);

               return redirect('/admin/image/')
                      ->with(['success' => '画像登録が完了しました。']);

           } catch (Exception $e) {
               throw new Exception($e->getMessage());
           }
       }

        /**
         * 変更完了
         *
         * @param ImageEditComplateRequest $request
         */
         public function edit_complate(ImageEditComplateRequest $request)
         {
             try {
                 if (! $images = Image::whereRaw('id = :id', [':id' => $request->id])
                           ->first()) {
                     throw new Exception('Image data Getting Failed.' . $request->id . ']');
                 }

                 if ($request->hasFile('data')) {
                     if(! $request->file('data')->isValid()) {
                         throw new Exception('file upload failed.');
                     }

                     $dat = self::getBinary($request->file('data'));
                     $images->original_name = $request->file('data')->getClientOriginalName();
                     $images->mime_type = $request->file('data')->getMimeType();
                     $images->filesize = $request->file('data')->getClientSize();
                     $images->data = $dat;
                 }

                 $images->name = $request->name;
                 $images->updated = Carbon::now();
                 $images->save();

                 return redirect('/admin/image/')
                        ->with(['success' => '変更が完了しました。']);
             } catch (Exception $e) {
                 throw new Exception($e->getMessage());
             }
         }

         /**
          * バイナリーデータ取得
          *
          * @param string $filename
          */
          private static function getBinary($filename)
          {
              try {
                  return file_get_contents($filename);
              } catch (Exception $e) {
                  throw new Exception("file getting failed.");
              }
          }
}
