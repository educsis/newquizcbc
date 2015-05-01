<a href="#" class="cerrar btn btn-xs btn-danger" style="text-align: center; float: right;">CERRAR</a>
<div class="clearfix"></div>
<div class="tableWrapper">
	<table class="table table-condensed" id="tablas" style="font-size: 12px;">
		<thead>
			<tr>
				<th style="text-align: center;">
					Usuario
				</th>
				<th style="width: 100px; text-align: center;">
					Punteo
				</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($rank as $r) {
			?>
			<tr>
				<td><?= $r['usuario']; ?></td>
				<td style="text-align: center;"><?= $r['punteo']; ?></td>
			</tr>
			<?php 
			}
			?>
		</tbody>
	</table>
</div>	