<?php 
	$destination = destination();
?>

<div class="mask-select" id="select_colse"></div>
 <div class="col-md-6 col-12" style="margin-bottom: 10px">
	<div class="seclect">
		<p>Danh Mục</p>
		<div class="div_select" style="position: relative;">
			<input type="" name="" id="select" placeholder="Danh mục điểm đến" >
			<i class="fas fa-angle-down" id="select"></i>
			<div class="pop_select">
				<ul>
					<?php
						if(!empty($destination)){
							foreach ($destination as $key => $value) { ?>
								<li><a href="<?php echo $value['urlSlug']?>"><?php echo $value['name']?></a></li>
					<?php	}
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>

