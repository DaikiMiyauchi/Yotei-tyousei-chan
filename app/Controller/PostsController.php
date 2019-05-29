<?php
class PostsController extends AppController{
   public $scaffold;

   public function regist() {
      if($this->request->is('post')){
         $hoge = $this->Post->find('all');
         var_dump($hoge);
         $this->set(compact('posts'));
         $this->Post->save($this->request->data);
         }
      }

   public function view(){
      echo "hoge";
   }

}

?>