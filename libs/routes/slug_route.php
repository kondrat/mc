<?php
class SlugRoute extends CakeRoute {
 
    function parse($url) {
        $params = parent::parse($url);
        if (empty($params)) {
            return false;
        }else{
        	//debug($params);
        }
        App::import('Model', 'User');
        $Post = new User();
        $count = $Post->find('count', array(
            'conditions' => array('User.username LIKE ?' => $params['slug'] .'%'),
            'recursive' => -1
        ));
        if ($count) {
            return $params;
        } else {
        	echo 'blinnn';
        }
        return false;
    }
 
}
?>
