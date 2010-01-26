<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2010-01-26 17:01:34 : 1264517494*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $User = null;
	var $fixtures = array('app.user');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function testUserInstance() {
		$this->assertTrue(is_a($this->User, 'User'));
	}

	function testUserFind() {
		$this->User->recursive = -1;
		$results = $this->User->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('User' => array(
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
		$this->assertEqual($results, $expected);
	}
}
?>