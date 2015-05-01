<input type="hidden" class="idp" value="<?= $lastId; ?>"; />
<?php
	$cantidad = count($preguntas);
	$conteo = 1;
	foreach($preguntas as $p){
		$shuffle = array("r1","r2","r3");
		shuffle($shuffle);
?>
<div class="lasPreguntas">
	<h5 class="laPregunta">
		<?= $p['pregunta']; ?>
	</h5>
	<div class="respuestasWrapper fadeIn animated">
		<?php 
		foreach($shuffle as $s){
			if($p[$s]!=''){
		?>
		<a href="#" class="btn btn-md btn-default respuestas" data-stat="<?= ($s=='r1')?1:0; ?>" data-last="<?= ($conteo==$cantidad)?1:0; ?>"><?= $p[$s]; ?></a>
		<?php 
			}
		}
		?>
	</div>
</div>
<?php
	$conteo++;
	}
?>
<div class="elFinal">
	<h1 class="mensajeFinal">Felicidades, haz llegado al final de las preguntas.</h1>
	<br>
	<a href="<?= base_url(); ?>" class="btn btn-default btn-lg" style="background-color: #79B900; color: #fff; font-weight: bold;">JUGAR DE NUEVO</a>
</div>