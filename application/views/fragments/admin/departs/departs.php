<?= $header_nav; ?>

<style type="text/css">
	
	#filter_form {
		margin-left:50px;
		float:left;
		position:absolute;
		margin-top:230px;
	}
	
	#table_section {
		margin-left:50px;
		margin-top:20px;
		width:700px;
	}
	
	#table_to_print {
		display:none;
	}
	
	.table td.heure {
		vertical-align:middle;
		text-align:center;
	}
	
	table.table th {
		text-align:center;
	}
	
</style>

<style type="text/css" media="print">
	
	
	
	footer, #main-nav, #sub-nav, #status-bar, #header-shadow, .container_12 {
		display:none;
	}
	
	.no_print {
		
		display:none;
	}
	
	#table_to_print {
		display:block;
		margin:auto;
		border:1px solid black;
		width:100%;
		border:none;
	}
	
	#table_to_print tr {
		width:100%;
	}
	
	#table_to_print td, #table_to_print th {
		border: 1px solid black;
		padding:5px;
	}
		
	#table_to_print td.heure {
		vertical-align:middle;
		text-align:center;
	}
		
	#table_to_print th.header {
		text-align:center;
		border: 1px solid black;
		padding:20px;
	}
	
	#table_to_print td.dummy {
		border:none;
	}
	
</style>



<?php
if(isset($datepicker)) {
	echo $datepicker;
}
?>

<form class="no_print" id="filter_form" action="" method="GET">
	de 
	<select name="heure_debut">
		<?php
		foreach($hours as $heure) {
			if($heure_debut == $heure)
				echo "<option value='".$heure."' selected='selected'>".$heure."</option>";
			else
				echo "<option value='".$heure."'>".$heure."</option>";
		}
		?>
	</select>
	à :
	<select name="heure_fin">
		<?php
		foreach($hours as $heure) {
			if($heure_fin == $heure)
				echo "<option value='".$heure."' selected='selected'>".$heure."</option>";
			else
				echo "<option value='".$heure."'>".$heure."</option>";
		}
		?>
	</select>

	<input type="submit" value="Filtrer" />
</form>

<section id="table_section" class="grid_12 no_print">
	<div class="block-border">
		<form class="block-content form" id="table_form" method="post" action="">
			<h1>Départs</h1>

			<div class="block-controls">
				<ul class="controls-buttons">
					<li><a id="print_departs" href="#"><img src="/assets/oscrud/themes/flexigrid/css/images/print.png" width="16" height="16"></a></li>
				</ul>
			</div>

			<div class="no-margin">
				<table class="table" cellspacing="0" width="100%">

				<thead>
					<tr>
						<th colspan=3><?=$req_date?></th>
					</tr>
					<tr>
						<th scope="col" class="header">Heure</th>
						<th scope="col" class="header">Trou 1</th>
						<th scope="col" class="header">Trou 10</th>
					</tr>
				</thead>

				<tbody>

					<?php
				foreach($reservations_by_hour as $date => $reservations) {
					$datetab = explode(" ", $date);
					$heure = $datetab[1];
					$heure = substr($heure,0, strlen($heure)-3);
					?>

					<tr>
						<td class="heure"><?=$heure?></td>
						<td>
							<?php

						$br = 0;
						foreach($reservations as $reservation) {
							if(array_key_exists('trou_depart', $reservation) && $reservation['trou_depart'] == 1) {
								if($reservation["user_id"] > 1) {
									echo $reservation["firstname"]." ".$reservation["lastname"]." (".$reservation["indice"].")";
								}
								else {
									echo $reservation['info']." (".$reservation["username"].")";
								}
								
								if($reservation["ressource"] != "") {
									echo " / ".$reservation["ressource"];
								}

								if($br < 3) {
									echo "<br />";
								}
								$br++;
							}
							else if(isset($reservation['trou']) && $reservation['trou'] == 1){
								echo $reservation["intitule"];
							}
						}

						?>
					</td>
					<td>
						<?php

					$i = 0;
					$br = 0;
					foreach($reservations as $reservation) {
						if(array_key_exists('trou_depart', $reservation) && $reservation['trou_depart'] == 10) {
							if($reservation["user_id"] > 1) {
								echo $reservation["firstname"]." ".$reservation["lastname"]." (".$reservation["indice"].")";
							}
							else {
								echo $reservation['info']." (".$reservation["username"].")";
							}

							if($reservation["ressource"] != "") {
								echo " / ".$reservation["ressource"];
							}

							if($br < 3) {
								echo "<br />";
							}

							$i++;
							$br++;
						}	
						else if(isset($reservation['trou']) && $reservation['trou'] == 10){
							echo $reservation["intitule"];
						}
					}

					for($j = $i; $j < 4; $j++) {
						echo "<br />";
					}

					?>
				</td>
			</tr>

			<?php } ?>

		</tbody>

	</table>
</div>				

</form>
</div>
</section>




<table id="table_to_print">
		<tr>
			<th colspan=3><?=$req_date?></th>
		</tr>
	<tr>
		<th style="width:90px;">
			Heure
		</th>
		<th style="width:300px;">Trou 1</th>
		<th style="width:300px;">Trou 10</th>
	</tr>
	
<?php
$nb_lines = 0;
foreach($reservations_by_hour as $date => $reservations) {
	$datetab = explode(" ", $date);
	$heure = $datetab[1];
	$heure = substr($heure,0, strlen($heure)-3);
	
?>
	
	<tr>
		<td class="heure"><?=$heure?></td>
		<td>
			<?php
			
			$br = 0;
			foreach($reservations as $reservation) {
				if(array_key_exists('trou_depart', $reservation) && $reservation['trou_depart'] == 1) {
					if($reservation["user_id"] > 1) {
						echo $reservation["firstname"]." ".$reservation["lastname"]." (".$reservation["indice"].")";
					}
					else {
						echo $reservation['info']." (".$reservation["username"].")";
					}
					
					if($reservation["ressource"] != "") {
						echo " / ".$reservation["ressource"];
					}
					
					if($br < 3) {
						echo "<br />";
					}
					$br++;
				}
				else if(isset($reservation['trou']) && $reservation['trou'] == 1){
					echo $reservation["intitule"];
				}
			}
			
			?>
		</td>
		<td>
			<?php
			
			$i = 0;
			$br = 0;
			foreach($reservations as $reservation) {
				if(array_key_exists('trou_depart', $reservation) && $reservation['trou_depart'] == 10) {
					if($reservation["user_id"] > 1) {
						echo $reservation["firstname"]." ".$reservation["lastname"]." (".$reservation["indice"].")";
					}
					else {
						echo $reservation['info']." (".$reservation["username"].")";
					}
					
					if($reservation["ressource"] != "") {
						echo " / ".$reservation["ressource"];
					}
					
					if($br < 3) {
						echo "<br />";
					}
					
					$i++;
					$br++;
				}
				else if(isset($reservation['trou']) && $reservation['trou'] == 10){
					echo $reservation["intitule"];
				}
			}
			
			for($j = $i; $j < 4; $j++) {
				echo "<br />";
			}
			
			?>
		</td>
	</tr>
	
<?php

	$nb_lines++;
	if($nb_lines >= 13) {
		$nb_lines = 0;
	?>
	<tr class="dummy" style="page-break-before:always;">
		<td colspan="3" class="dummy"></td>
	</tr>
	<tr>
		<th colspan=3><?=$req_date?></th>
	</tr>
	<tr>
		<th>
			Heure
		</th>
		<th>Trou 1</th>
		<th>Trou 10</th>
	</tr>
	<?php
	}
	
	//echo $date;
	//echo "<br />";
}

?>
</table>

<script type="text/javascript">
	
	$("#print_departs").click(function(){
		window.print();
	});
	
</script>