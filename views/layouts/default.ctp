<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('MC:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php

	
		echo $html->meta('icon');
		echo $html->css(array('mc','mc-u','screen'));

		//echo $html->css('print');
		echo '<!--[if IE]>';
		echo $html->css('ie');
		echo $html->css('mc-ie');
		echo '<![endif]-->';

		echo $html->scriptBlock('var path = "'.Configure::read('path').'";' );
		echo $html->script(array('jquery/jquery-1.4.1.min','jquery/jquery.form','jquery/ui.core','jquery/ui.draggable','common'));


		//echo $javascript->link('dbg/prettyPrint');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div class="pageheader" style="">
			<div class="container">
				<div class="span-24 topInput" style="margin:20px 0;">
						<div class="span-11 prepend-6">
							<?php echo  $form->create('User'); ?>
								<?php echo $form->input('username',array('label'=>'moy<span style="text-shadow:2px 1px 1px #CCCCCC;">C</span>ontact.ru / ','div'=>false));?>
							<?php echo $form->end();?>
						</div>
						<div class="span-4" style="position:relative;" >
							<div class="topSearch">
								<div class="topSearchInner"><?php echo __('Search');?></div>
							</div>
						</div>
					</div>

			</div>
			
	</div>
	<div class="container showgrid.">
		    <div class="span-4">
		        Left sidebar
		        <hr />
		        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
		    </div>
		
		    <div class="span-16">

		        <div class="span-16 clear last myrr">
							<div class="fl span-16 last" style="font-weight:bold; position:relative;">
									<?php $session->flash(); ?>
							</div>
							<?php echo $content_for_layout; ?>
		        </div>
		    </div>
		    <div class="span-4 last">
		        Right sidebar
		        <hr />
						
						<div id="test1">test1</div>
						<p class="margin:0;"> Data from app</p>
						<div id="test2"></div>
						<p style="margin:0"> real </p>
						
						<div id="test3">test3</div>
						
						<!--<div class="delCookie" style="cursor: pointer">delCookie</div>-->
						<div class="delWorkSession">
							<?php echo $html->link('Delete workSession',array('controller'=>'intervals','action'=>'delWorkSession'));?>
						</div>



		    </div>


	


		
	</div>
	<div class="pagefooter" style="">
			<div class="container">
				<div class="span-24">
					
			    <div class="span-24">
			    	<div class="footerNote">
		      	 www.moycontact.ru &copy;<?php echo date('Y');?>
		      	</div>
		   		</div>
		   		
			  </div>
			</div>
	</div>
			
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>