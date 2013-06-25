<div class="perfil">
	<div class="categoria">
		<span><?php echo $perfil->areas->nombre ?></span> 
		<?php if( !empty($perfil->propuestases->subgenero) ): ?>
			<span><?php echo $perfil->propuestases->subgenero ?></span>
		<?php endif; ?>
	</div>
	<img src="" alt="<?php echo $perfil->nombre ?>" />
	<h3><?php echo $perfil->nombre ?></h3>

	<pre><?php //print_r($perfil) ?></pre>
</div>