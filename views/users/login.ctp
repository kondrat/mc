<div class="inner_page">
	
		<h3><?php __('Sign in to moyContact');?></h3>
		
		<?php echo $form->create('User', array('action' => 'login' ) ); ?>
		
		<div class="formWrap span-16">
			<?php echo $form->input('username', array('div'=>array("id"=>"usernameWrap"),
																								'label'=>__('Username',true)	) 
															); ?>	
		</div>	
		<div class="formWrap span-16">
			<?php echo $form->input('password' , array(	'type' => 'password',
																									'div'=>array("id"=>"passWrap"), 
																									'label'=>__('Password',true)	) 
															); ?>
		</div>
		<div class="autoLogin push-4 span-12">
			<?php echo $form->input('auto_login', array('type' => 'checkbox', 
																									'label' =>  __('Remember Me',true) ,
																									'div'=>false ) 
															); ?>
		</div>
		
	
		<div class="push-4 span-12">	
				<span><?php echo $form->button( __('Submit',true), array('type'=>'submit', 'id'=>'logSubmit') ); ?></span>
		</div>
				
		<?php echo $form->end(); ?>

		<div class="push-6 span-10"><?php echo $html->link(__('Forgot your password?',true), array('admin'=> false, 'action' => 'reset'), array('class' => '' ) ); ?></div>

		
		<div class="reg" style="position:absolute; left:400px;top:50px;">
			<?php echo $html->link(__('Sign up now',true), array('controller'=>'users','action'=>'reg') );?>
		</div>
</div>



