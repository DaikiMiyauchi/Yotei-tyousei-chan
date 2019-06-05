<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Schedule extends AppModel {
  public $validate = array(
      'username' => array(
          'required' => array(
              'rule' => 'notBlank',
              'message' => 'A username is required'
          )
      ),
      'password' => array(
          'required' => array(
              'rule' => 'notBlank',
              'message' => 'A password is required'
          )
      ),
      'role' => array(
          'valid' => array(
              'rule' => array('inList', array('admin', 'author')),
              'message' => 'Please enter a valid role',
              'allowEmpty' => false
          )
      )
  );
}
?>