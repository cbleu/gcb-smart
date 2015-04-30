<?php

if(!$success) {
	echo $message;
	exit;
}

?>

<div id="confirmation_div">	
	<h3><?=$date?></h3>
	
	<div id="nb_trous_div">
		<ul class="ul_confirmation">
			<li>Parcours de <?=$nb_trous?> trous <span class='info_supl_span'>( Départ trou N°<?=$trou_depart?> )</span></li>
			<li>Durée du parcours &#8776; <?=$duree_parcours?> <span class='info_supl_span'>( Fin du parcours estimé à <?=$heure_fin?> )</span></li>
		</ul>
	</div>
	<div id="joueurs_div">
		<h3>Joueurs : </h3>
		<ul class="ul_confirmation">
			<?php
				// $i = 0;
				foreach($players as $player) {
					// $ressource = "";
					// foreach($ressources as $r => $num_array) {
					// 	if(count($num_array) > 0) {
					// 		foreach($num_array as $numj){
					// 			if($numj == $i) {
					// 				$ressource = $r;
					// 			}
					// 		}
					// 	}
					// }
					echo "<li>";
					echo ($player->id == 0) ? "Invité" : ($player->id == 1)? "Visiteur" : $player->firstname." ".$player->lastname;
					if(count($player->ressources) > 0) {
						echo " <span class='info_supl_span'>( ". $player->ressources[0] ." )<span>";
					}
					echo "</li>";
					// $i++;
				}
			?>
		</ul>
		
	</div>
</div>