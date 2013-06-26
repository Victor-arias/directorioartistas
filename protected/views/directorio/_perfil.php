<div class="perfil">
	<div class="categoria">
		<?php if( isset($data->areas->nombre)): ?>
			<span class="<?php echo $data->areas->nombre ?>"><?php echo $data->areas->nombre ?></span> 
		<?php endif; ?>
		<?php if( isset($data->propuestases[0]->subgenero) && ($data->areas->nombre == 'Música' || $data->areas->nombre == 'Otro') ): ?>
			<?php $subg = ( strlen($data->propuestases[0]->subgenero) > 19) ? substr($data->propuestases[0]->subgenero, 0, 16) . '...':$data->propuestases[0]->subgenero ?>
			<span><?php echo $subg; ?></span>
		<?php endif; ?>
	</div>
	<?php 
		if( !empty($data->fotoses) ):
			foreach($data->fotoses as $foto): ?>
			<?php if( $foto->es_perfil): ?>
				<img src="<?php echo $foto->src ?>" width="140" height="130" alt="<?php echo $data->nombre ?>" />
			<?php endif ?>
	<?php 
			endforeach; 
		else:
	?>
	<img src="/files/default.jpg" width="140" height="130" alt="<?php echo $data->nombre ?>" />
<?php endif; ?>
	<div class="nombre">
		<h3><?php echo $data->nombre ?></h3>
	</div>
</div>