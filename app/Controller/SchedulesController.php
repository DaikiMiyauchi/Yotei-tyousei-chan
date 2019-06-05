<?php

App::uses('AppController', 'Controller');


class SchedulesController extends AppController{

  public function index($id=null,$id2=null){
    //debug($this->Auth->user());
    if($id != null)
    {
      $this->set('username',$id);
    }else{
      $this->set('username','未実装');
    }
    echo AuthComponent::user('username');
    $options = array(
      // 'conditions' => array(
      //   // 'Schedule.scheduleId'=>2
      // )
      'fields'=>array('id','scheduleName', 'createdby','updateAt')
      );
    $hoge=$this->Schedule->find(
      'all',$options
    );

    $this->set('hoge', $hoge);

    if ($this->request->is('post')) {
              $this->User->create();
              if ($this->User->save($this->request->data)) {
                  $this->Flash->success(__('The Schedules has been saved'));
                  return $this->redirect(array('action' => 'index'));
              }
              $this->Flash->error(
                  __('The user could not be saved. Please, try again.')
              );
          }
  }

  public function add(){
    /*
    $this->Auth->user();
    本来はこれでユーザー名を取得できるはずだが、'test'で固定された状態で更新されない。
    これを解決できれば完成
    */

    $user='未実装';
    $this->set('username',$user);

    if ($this->request->is('post')) {
      //
      $data = $this->request->data;
      if($data['Schedule']['nittei'] != 'NULL'){
        $hoge = $data['Schedule']['nittei'];
      }

      $this->Schedule->create();
      if ($this->Schedule->save($this->request->data)) {
          $this->Flash->success(__('New Schedule has been saved'));
          return $this->redirect(array('action' => '/index'));
      }
      $this->Flash->error(
          __('The user could not be saved. Please, try again.')
      );
    }
  }

  public function into(){
    $options = array(
      'conditions' => array(
        'Schedule.id'=>$_GET['id']
      ));
    $find_result=$this->Schedule->find(
      'all', $options
    );
    $this->set('find_result',$find_result);

    $nittei = $find_result[0]['Schedule']['nittei'];
    $kouho = $find_result[0]['Schedule']['kouho'];
    $nittei_array = array();
    $kouho_array = array();
    $nittei_array=explode(",",$nittei);
    $kouho_array=explode(",",$kouho);


    $this->set('nittei_array',$nittei_array);
    $this->set('kouho_array',$kouho_array);

  }

  public function edit()
  {
      if(!($this->request->is('post'))) {
        $options = array(
          'conditions' => array(
            'Schedule.id'=>$_GET['id']
          ));
        $hoge=$this->Schedule->find(
          'all', $options
        );
        $this->set('hoge',$hoge);
      }else{
        $data = $this->request->data;
        // debug((int) $data['Schedule']['scheduleId']);
        $debug = $data['schedule']['kouho'];
        $box=implode(",",$debug);
        $this->Schedule->kouho=$box;
        $this->request->data['Schedule']['kouho']=$box;
        $this->Schedule->id = $data['Schedule']['id'];
        // $this->Schedule->scheduleId = (int) $data['Schedule']['scheduleId'];
        if ($this->Schedule->save($this->request->data)) {
            $this->Flash->success(__('成功しました'));
            return $this->redirect(array('action' => '/index'));
        }
       }
  }

  public function delete(){
    //echo "<script>confirm('本当に削除してもよろしいですか？');</script>";
      $this->Schedule->delete($_GET['id']);
      return $this->redirect(array('action' => 'index'));
  }
}

?>