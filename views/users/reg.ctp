<div class="inner_page">

		<h2><?php __('Join moyContact world');?></h2>
		
		<?php echo $form->create('User', array(
																						'action' => 'reg',        
																					 	'inputDefaults' => array(
            																												'label' => false,
            																												'div' => false
        																														)																				
		
		 ) ); ?>
	
					<div class="formWrap span-16">
						<?php echo $form->input('username', array('div'=>array("id"=>"usernameWrap"),
					
											'label'=>__('Username',true) ,									
											'error' => array(
																			'notEmpty' => __('This field cannot be left blank',true),
													      			'alphanumeric' => __('Only alphabets and numbers allowed', true),
													      			'betweenRus' => __('Username must be between 4 and 10 characters long', true),
													      			'checkUnique' => __('This username has already been taken',true),
						      										)	
						      					
						 			) ); 
						?>
						<div id="chName" style="display:none;"><?php echo $html->image("icons/ajax-loader1.gif");?><?php __('Checking availability...');?></div>
						<div id="nameFormTip" style="padding:5px;float:left;padding:0 0 0 5px;width:255px;color:#ccc;"><?php __('Only letters and numbers, 16 char max.');?></div>
						<div id="yourUrl" class="span-12 prepend-4"><?php __('Your URL http://moycontact.ru/');?><span>username</span></div>
					</div>
	
					<div class="formWrap span-16">	
						<?php echo $form->input('password1' , array('type' => 'password','div'=>array("id"=>"passWrap"),
											'label'=>__('Password',true),
											'error' => array(
													      			//'alphanumeric' => __('Only alphabets and numbers allowed', true),
													      			'betweenRus' => __('Password must be between 2 and 15 characters long', true),
						      										)						
									 ) ); 
						?>
						<div id="passFormTip" style="padding:5px;float:left;padding:0px 0 0px 5px;width:255px;color:#ccc;"><?php __('Password must be between 2 and 15 characters long');?></div>
					</div>	
					<div class="formWrap span-16">	
						<?php echo $form->input('password2' , array('type' => 'password','div'=>array("id"=>"pass2Wrap"),
											'label'=>__('Confirm Password',true),
											'error' => array(
													      			'passidentity' => __('Please verify your password again', true),
						      										)	
							 ) ); 
						?>
					</div>	
					<div class="formWrap span-16">	
						<?php echo $form->input('email' , array('div'=>array("id"=>"emailWrap"),"class"=>"email required",
											'label'=>__('Email',true),
											'error' => array(
													      			'email' => __('Your email address does not appear to be valid', true),
													      			'checkUnique' => __('This Email has already been taken',true),
						      										)						
							 ) ); 
						?>
						
					</div>		
								
					<div class="capchaImg clearfix">
	
						<div class="capPlace"><?php echo $html->image( array('controller'=>'users','action'=>'kcaptcha',time() ),array('id'=>'capImg') );?></div>

						
						<div class="capReset">
							<p><?php echo $html->image('icons/001_39.png');?><span><?php __('Couldn\'t see');?></span></p>
						</div>
					</div>					
					
					<?php echo $form->input('captcha', array('div'=> array("id"=>"captchaWrap","class"=>"formWrap"), 'label' => __('Please type in the code',true),
										'error' => array(
																		'notEmpty' => __('This field cannot be left blank',true),
											        			'alphanumeric' => __('Only alphabets and numbers allowed', true),
											        			'equalCaptcha' => __('Please, correct the code',true),
				        										)						
						 ) );	
					?>	
			
				<div class="submit clearfix">	
					<span><?php echo $form->button( __('Submit',true), array('type'=>'submit', 'id'=>'regSubmit','class'=>'span-3') ); ?></span>
				</div>
		
	<?php echo $form->end(); ?>
</div>

