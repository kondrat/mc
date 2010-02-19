<?php
class SlugRoute extends CakeRoute {
 
    function parse($url) {
        $params = parent::parse($url);
        
        //debug($params);
        
        if (empty($params)) {
        	//echo 'billnn1';
            return false;
        }else{
        	//debug($params);
        }
        App::import('Model', 'User');
        $Post = new User();
        $count = $Post->find('count', array(
            'conditions' => array('User.username' => $params['uname'] ),
            'recursive' => -1
        ));
        if ($count) {
        	  //debug($params);
            return $params;
        } else {
        	//echo 'blinnn2';
        }
        //echo 'false';
        return false;
    }
 
}
?>
