<!-- ****************************** -->
<!-- WIZARD: DHTML PART             -->
<!-- ****************************** -->

<!-- ****************************** -->
<!-- DOM fragment for Wizard template -->

<div id="content" style="opacity:1;">

	<div class="row">

		<!-- NEW WIDGET START -->
		<div class="col-sm-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-magic"></i> </span>
					<h2>Assistant de réservation</h2>
				</header>
				<div id="progress-wizard" class=" progress-sm progress-striped active">
					<div class="bar progress-bar"></div>
				</div>
				
				<!-- widget div-->
				<div>
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body">
						<div class="row">
							<div class="col-sm-12">
								<!-- Debut du Formulaire du Wizard -->
								<form id="wizard_form" novalidate="novalidate">
									<div id="wizard_form_DOM" class="col-sm-12">
										<!-- Début etapes du wizard-->
										<div class="form-bootstrapWizard">
											<ul class="bootstrapWizard form-wizard">
												<li class="active" data-target="#step1">
													<a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Date</span> </a>
												</li>
												<li data-target="#step2">
													<a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Heure</span> </a>
												</li>
												<li data-target="#step3">
													<a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Joueurs</span> </a>
												</li>
												<li data-target="#step4">
													<a href="#tab4" data-toggle="tab"> <span class="step">4</span> <span class="title">Récapitulatif</span> </a>
												</li>
											</ul>
											<div class="clearfix"></div>
										</div>
										<!-- Fin Etapes du wizard-->

										<!-- Début contenu des etapes-->
										<div class="tab-content">

											<!-- ****************************** -->
											<!-- Page 1 Date                    -->
											<div class="tab-pane active" id="tab1">
												<h3><strong>Etape 1 </strong> - La date</h3>

												<div class="row row-centered">
													<div class="col-xs-8 col-sm-6 col-md-6 col-centered">
														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon"><i class="fa fa-calendar fa-lg fa-fw"></i></span>
																<input type="text" id="date_resa" name="date_resa" readonly placeholder="Choisir une date" class="form-control input-lg serialize"/>
															</div>
														</div>
													</div>
												</div> <!--end row-->

												<div class="row row-centered">
													<div class="col-12 col-centered">
														<div id="datepicker-container">
															<div id="datepicker-center">
																<div id="datepicker"></div>
															</div>
														</div>
													</div>
												</div> <!--end row-->

											</div> <!-- end tab-pane -->

											<!-- ****************************** -->
											<!-- Page 2 Parcours                -->
											<div class="tab-pane" id="tab2">
												<h3><strong>Etape 2</strong> - L'horaire et le parcours</h3>

												<div class="row row-centered">
													<div class="col-xs-8 col-sm-6 col-md-6 col-centered">
														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon"><i class="fa fa-flag fa-lg fa-fw"></i></span>
																<span class="input-group-addon">Nombres de trous: </span>
																<input type="checkbox" checked data-toggle="toggle" data-on-text="18 Trous" data-off-text="9 Trous" data-label-width="0" data-handle-width="100" name="nb_trous_sw" id="nb_trous_sw">
															</div>
														</div>
													</div>
												</div><!--end row-->

												<div class="row row-centered">
													<div class="col-xs-8 col-sm-6 col-md-6 col-centered">
														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon"><i class="fa fa-clock-o fa-lg fa-fw"></i></span>
																<span class="input-group-addon">Départs possibles :</span>
																<select multiple id="heure_resa" name="heure_resa" class="form-control select multiple-select serialize">
																	<optgroup id="nb_trous_optgroup" label="18 Trous"></optgroup>
																</select>
															</div>
														</div>
													</div>
												</div><!--end row-->

												<!-- <div class="col-sm-4">
													<div class="onoffswitch-container">
														<span class="onoffswitch-title">Nombre de trous</span>
														<span class="onoffswitch">
															<input type="checkbox" class="onoffswitch-checkbox" name="nb_trous_sw" id="nb_trous_sw">
															<label class="onoffswitch-label" for="nb_trous_sw">
																<span class="onoffswitch-inner  egp-normal" data-swchon-text="18" data-swchoff-text="9"></span>
																<span class="onoffswitch-switch"></span>
															</label>
														</span>
													</div>
												</div> -->

												<!-- <div class="col-sm-4">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-flag fa-lg fa-fw"></i></span>
															<select id="heure_resa" name="heure_resa" class="form-control select multiple-select serialize">
																<optgroup id="nb_trous_optgroup" label="18 Trous"></optgroup>
															</select>
														</div>
													</div>
												</div> -->

												<input type="hidden" name="nb_trous" id="nb_trous" class="serialize" value="18" />

											</div> <!-- end tab-pane -->

											<!-- ****************************** -->
											<!-- Page 3 Joueurs                 -->
											<div class="tab-pane" id="tab3">
												<h3><strong>Etape 3</strong> - Les joueurs</h3>

												<input type="hidden" id="places_dispo" value="4">

												<? if($isLogged){?>
													<!-- fieldset for members -->
													<? for($i = 1; $i <= 4; $i++) { ?>
														<div class="form-group" style="margin-bottom: 20px">
															<label class="control-label big" for='joueur<?=$i;?>'>Joueur #<?=$i;?></label>
															<div class="controls">
																<? if($isAdmin && $i ==1){?>
																	<input type="text" placeholder="Chercher un nom..." id="joueur<?=$i;?>" name="joueur<?=$i;?>" class="joueur_input serialize" value="" style="height: 30px"/>
																	<input type="hidden" name="id_joueur1" id="id_joueur1" class="serialize" value="2">
																<? }else{ ?>
																	<input type="text" placeholder="Chercher un nom..." id="joueur<?=$i;?>" name="joueur<?=$i;?>" class="joueur_input serialize" value="<?=$players[$i]['name'];?>" <?=$players[$i]['tags'];?> style="height: 30px"/>
																	<input type="hidden" name="id_joueur<?=$i;?>" id="id_joueur<?=$i;?>" class="serialize" value="<?=$players[$i]['id'];?>">
																<? } ?>
																<input type="hidden" name="nbTrousJ<?=$i;?>" id="nbTrousJ<?=$i;?>" class="serialize" value="">
																<?php for($k = 0; $k < count($ressources); $k++) {
																	echo "<input type='checkbox' name='" .$ressources[$k]['ressource'] ."[]' class='" .$ressources[$k]['ressource'] ."_check cb_ressource_" .$i ." serialize' value='" .($i - 1) ."' /> " .$ressources[$k]['ressource'];
																} ?>
															</div>
														</div>
													<? } ?>
													<input type="hidden" name="nb_joueurs" id="nb_joueurs" class="serialize">
												<? }else{?>
													<!-- fieldset for visitors -->
													<div class="row row-centered">

														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-centered">
															<div class="form-group">

																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-user fa-lg fa-fw"></i></span>
																	<input id="client_name" name="client_name" placeholder="Nom" class="form-control input-lg serialize" type="text" >
																</div>
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-user fa-lg fa-fw"></i></span>
																	<input id="client_firstname" name="client_firstname" placeholder="Prénom" class="form-control input-lg serialize" type="text" >
																</div>
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-envelope-o fa-lg fa-fw"></i></span>
																	<input id="client_email" name="client_email" placeholder="Email (email@domain.com)" class="form-control input-lg serialize" type="text" >
																</div>
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-phone fa-lg fa-fw"></i></span>
																	<input id="client_phone" name="client_phone" placeholder="Télephone" class="form-control input-lg serialize" type="text" >
																</div>

															</div>
														</div>

														<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 col-text-centered">
															<div class="form-group col-text-centered">
																<div class="input-group">
																	<div>
																		<input type="text" id="nb_joueurs"  name="nb_joueurs" class="dial" data-min="0" data-max="4" value=1 data-width="120" data-height="120" data-displayInput=true >
																	<!-- </div>
																	<div> -->
																		<span class="input-group-addon"><i class="fa fa-user fa-lg fa-fw"></i></span>
																		<span class="input-group-addon"> Nb de joueurs </span>
																	</div>
																</div>
															</div>
														</div>

														<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 col-text-centered">
															<div class="form-group col-text-centered">
																<div class="input-group">
																	<div>
																		<input type="text" id="nb_chariots"  name="nb_chariots" class="dial" data-min="0" data-max="4" value=0 data-width="120" data-height="120" data-displayInput=true >
																	</div>
																	<div>
																		<span class="input-group-addon"><i class="fa fa-check-square-o fa-lg fa-fw"></i></span>
																		<span class="input-group-addon"> Nb de Chariots </span>
																	</div>
																</div>
															</div>
														</div>

														<input type="hidden" id="id_joueur1" name="id_joueur1" class="serialize" value="1">
														<input type="hidden" id="places_dispo" value="4">

														<!-- <? for($k = 0; $k < count($ressources); $k++) { ?>
																<div class="controls" style="margin: 20px">
																	<span class="control-label big" for="nb_<?= $ressources[$k]['ressource'];?>" style="padding-right: 20px">Nombre de <?= $ressources[$k]['ressource'];?>s</span>
																	<? for($i = 0; $i <= $ressources[$k]['qte_max_par_partie']; $i++) { ?>
																		<input type="radio" name="nb_<?=$ressources[$k]['ressource'];?>s" class="serialize nb_<?= $ressources[$k]['ressource'];?>s" name="nb_<?=  $ressources[$k]['ressource'];?>s"  value="<?=$i;?>" <?=($i == 0) ? "checked" : "";?>/> <?=$i;?>
																	<? } ?>
																</div>
														<? } // for $k?> -->

													</div><!--end row-->

												<? }?>

											</div> <!-- end tab-pane -->

											<!-- ****************************** -->
											<!-- Page 4 Recapitulatif           -->
											<div class="tab-pane" id="tab4">
												<br>
												<h3><strong>Etape 4</strong> - Récapitulatif</h3>

												<div class"row">
													<div class="control-group">
														<div id="confirmation_status" class="controls">Chargement du récapitulatif de votre réservation...</div>
														<div id="confirmation_div" class="controls" style="display:none;">
															<h3><span id="recap_title"></span></h3>
															<div id="recap_nb_trous_div">
																<ul></ul>
															</div>
															<div id="recap_joueurs_div">
																<h3>Joueurs : </h3>
																<ul></ul>
															</div>
														</div>

														<div id="reservation_ready" class="controls" style="display:block;">
															<br>
															<h1 class="text-center text-success"><strong><!-- <i class="fa fa-check fa-lg"></i> --> Prêt ?</strong></h1>
															<h4 class="text-center">Cliquez sur Réserver pour valider la réservation</h4>
															<br>
															<br>
														</div>

														<div id="reservation_done" class="controls" style="display:none;">
															
															<br>
															<h1 class="text-center text-success"><strong><!-- <i class="fa fa-check fa-lg"></i> --> Bravo !</strong></h1>
															<h4 class="text-center">Votre réservation à bien été faite.</h4>
															<br>
															<br>
														</div>

													</div>
												</div>

											</div>

											<!-- ****************************** -->
											<!-- Page 5 Confirmation            -->
											<!-- <div class="tab-pane" id="tab5">
												<br>
												<h3><strong>Etape 5</strong> - Confirmation</h3>

												<br>
												<h1 class="text-center text-success"><strong><i class="fa fa-check fa-lg"></i> Complete</strong></h1>
												<h4 class="text-center">Click next to finish</h4>
												<br>
												<br>
											</div> -->

											<div class="form-actions">
												<div class="row" name="boutons-wizard">
													<div class="col-sm-12">
														<ul class="pager wizard no-margin">
															<li class="first disabled">
															<a href="javascript:void(0);" class="btn btn-lg btn-default"> Début </a>
															</li>
															<li class="previous disabled">
																<a href="javascript:void(0);" class="btn btn-lg btn-default"> Précédent </a>
															</li>
															<!--<li class="next last">
															<a href="javascript:void(0);" class="btn btn-lg btn-primary"> Last </a>
															</li>-->
															<li class="next">
																<a href="javascript:void(0);" class="btn btn-lg txt-color-darken"> Suivant </a>
															</li>
															<li class="next finish" style="display:none;">
																<a href="javascript:void(0);" class="btn-lg btn-success txt-color-darken"> Réserver <i class="fa fa-check fa-lg"></i></a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- Fin contenu des etapes-->
									</div>

									<!-- Hidden inputs for javascript controls -->
									<input type="hidden" name="isFormValid" id="isFormValid"  class="serialize" value="false">
									<input type="hidden" name="id_resa_provi_aller" id="id_resa_provi_aller"  class="serialize">
									<input type="hidden" name="id_resa_provi_retour" id="id_resa_provi_retour" class="serialize">

								</form>
								<!-- Fin du Formulaire du Wizard -->
							</div>
						</div>
					</div>
					<!-- end widget content -->
				</div>
				<!-- end widget div -->
			</div>
			<!-- end Widget ID-->

		</div>
		<!-- WIDGET END -->

	</div>
</div>

<!-- ****************************** -->
<!-- ****************************** -->

<!-- ****************************** -->
<!-- Script part                    -->

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?=ASSETS_URL?>/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

<script type="text/javascript">
	////////////////////////////////
	// GLOBAL VARS /////////////////
	////////////////////////////////
	'use strict';
	var serverIntervals = new Array(<?= $timeStr;?>);	// tableau complet des slots horaires serveur.
	var lastStartFor18hole = "<?=$lastStartFor18hole;?>";	// dernier depart en 18 trous
</script>
	
<script type="text/javascript">
	
	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	
$(document).ready(function() {
	
})

</script>
