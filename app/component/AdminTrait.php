<?php

namespace Component;

trait AdminTrait
{

    public function __construct()
    {
        \AdminFacade::setModel(self::$model);
    }

    /**
     * 一覧画面
     */
     public function index()
     {
         try {
             $data = \AdminFacade::callStaticFunc('paginate', [2]);
             return view(sprintf('admin.%s.index', self::$view), compact('data'));
         } catch (Exception $e) {
             throw new Exception($e->getMessage());
         }
     }

     /**
      * 新規登録
      *
      */
      public function regist()
      {
          return view(sprintf('admin.%s.regist', self::$view));
      }

      /**
       * 編集
       *
       * @param int $id
       */
       public function edit($id)
       {
           try {
               // WhereRaw実行
               $models = \AdminFacade::callStaticFunc('whereRaw',['id = :id', [':id' => $id]]);
               // $models->first()実行
               if (! $data = call_user_func([$models, 'first'])) {
                   throw new Exception(sprintf('%s data Getting Failed.', self::$model));
               }
               return view(sprintf('admin.%s.edit', self::$view), compact('data'));
           } catch (Exception $e) {
               throw new Exception($e->getMessage());
           }
       }

       /**
        * 削除
        *
        * @param int $id
        */
        public function delete($id)
        {
            try {
                // WhereRaw実行
                $models = \AdminFacade::callStaticFunc('whereRaw',['id = :id', [':id' => $id]]);

                // $models->delete()実行
                if(! $data = call_user_func([$models, 'delete'])) {
                    throw new Exception(sprintf('%s data Delete Failed.', self::$model));
                }

                return redirect(sprintf('/admin/%s', self::$view))
                        ->with(['success' => '削除が完了しました。']);
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

}
