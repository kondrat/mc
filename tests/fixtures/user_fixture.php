<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2010-01-26 17:01:34 : 1264517494*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $table = 'users';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'username' => array('type'=>'string', 'null' => true, 'length' => 64, 'key' => 'unique'),
		'password' => array('type'=>'string', 'null' => false, 'length' => 64),
		'key' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 32, 'key' => 'unique'),
		'type' => array('type'=>'string', 'null' => true, 'default' => 'guest', 'length' => 50),
		'timezone' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 3),
		'email' => array('type'=>'string', 'null' => false, 'length' => 100),
		'active' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'username' => array('column' => 'username', 'unique' => 1), 'key' => array('column' => 'key', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'username'  => 'Lorem ipsum dolor sit amet',
		'password'  => 'Lorem ipsum dolor sit amet',
		'key'  => 'Lorem ipsum dolor sit amet',
		'type'  => 'Lorem ipsum dolor sit amet',
		'timezone'  => 1,
		'email'  => 'Lorem ipsum dolor sit amet',
		'active'  => 1,
		'created'  => '2010-01-26 17:51:34'
	));
}
?>