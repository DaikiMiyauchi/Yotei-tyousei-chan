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

      public function add() {
         if ($this->request->is('post')) {
             //Added this line
             $this->request->data['Post']['user_id'] = $this->Auth->user('id');
             if ($this->Post->save($this->request->data)) {
                 $this->Flash->success(__('Your post has been saved.'));
                 return $this->redirect(array('action' => 'index'));
             }
         }
     }
     public function isAuthorized($user) {
      // 登録済ユーザーは投稿できる
      if ($this->action === 'add') {
          return true;
      }
  
      // 投稿のオーナーは編集や削除ができる
      if (in_array($this->action, array('edit', 'delete'))) {
          $postId = (int) $this->request->params['pass'][0];
          if ($this->Post->isOwnedBy($postId, $user['id'])) {
              return true;
          }
      }
  
      return parent::isAuthorized($user);
  }
  
   public function view(){
      echo "hoge";
   }
}
?>