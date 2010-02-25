<div class="inner_page">
	

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
		<div class="formWrap span-16">
			<?php echo $form->input('auto_login', array('type' => 'checkbox', 
																									'label' =>  __('Remember Me',true) ,
																									'div'=>array('class'=>'') ) 
															); ?>
		</div>
		
				
		<p style="margin: 0 0 0 12em;"><?php echo $html->link(__('Forgot your password?',true), array('admin'=> false, 'action' => 'reset'), array('class' => '' ) ); ?></p>

	
				<div class="submit clearfix">	
					<span><?php echo $form->button( __('Submit',true), array('type'=>'submit', 'id'=>'logSubmit','class'=>'span-3') ); ?></span>
				</div>
				
		<?php echo $form->end(); ?>
		
		<div class="reg" style="position:absolute; left:420px;top:30px;left:420px;">
			<?php echo $html->link(__('Get Started—Join!',true), array('controller'=>'users','action'=>'reg') );?>
		</div>
</div>



