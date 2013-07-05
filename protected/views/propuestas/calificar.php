<ul class="nav nav-list calificador">          
  <?php $idCriterioActual = 0; ?>
  <?php $i=0; foreach($criterios as $criterio): ?>    

  <?php if($idCriterioActual !== $criterio->tipo_criterio_id): ?>
    <li class="nav-header"><?php echo $criterio->tipoCriterio->nombre ?></li>      
  <?php $idCriterioActual = $criterio->tipo_criterio_id ?>
  <?php endif; ?>
  <li>
    <span class="lista-criterios"><?php echo $criterio->titulo ?></span> 
    <h5 class="select-mini"><?php echo $puntajes[$i] ?></h5>
  </li>
  <?php $i++; endforeach; ?>   
  <li><button id="btnCalificar" class="btn btn-info centrar">Calificar</button></li>         
</ul>