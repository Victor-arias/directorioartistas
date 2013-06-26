<div class="perfil">
	<div class="categoria">
		<?php if( isset($perfil->areas->nombre)): ?>
			<span class="<?php echo $perfil->areas->nombre ?>"><?php echo $perfil->areas->nombre ?></span> 
		<?php endif; ?>
		<?php if( isset($perfil->propuestases[0]->subgenero) && ($perfil->areas->nombre == 'Música' || $perfil->areas->nombre == 'Otro') ): ?>
			<?php $subg = ( strlen($perfil->propuestases[0]->subgenero) > 19) ? substr($perfil->propuestases[0]->subgenero, 0, 16) . '...':$perfil->propuestases[0]->subgenero ?>
			<span><?php echo $subg; ?></span>
		<?php endif; ?>
	</div>
	<?php 
		if( !empty($perfil->fotoses) ):
			foreach($perfil->fotoses as $foto): ?>
			<?php if( $foto->es_perfil): ?>
				<img src="<?php echo $foto->src ?>" width="140" height="130" alt="<?php echo $perfil->nombre ?>" />
			<?php endif ?>
	<?php 
			endforeach; 
		else:
	?>
	<img src="/files/default.jpg" width="140" height="130" alt="<?php echo $perfil->nombre ?>" />
<?php endif; ?>
	<div class="nombre">
		<h3><?php echo $perfil->nombre ?></h3>
	</div>
</div>