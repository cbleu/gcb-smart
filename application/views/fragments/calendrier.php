<!-- ****************************** -->
<!-- CALENDRIER: DHTML PART         -->
<!-- ****************************** -->

<!-- ****************************** -->
<!-- DOM fragment for calendar      -->

<div id="content" style="opacity:1;">

	<div name="calendrier_content" class="row">

		<!-- NEW WIDGET START -->
		<div class="col-sm-12">

			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
				<!-- <header>
					<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
					<h2>Calendrier</h2>
				</header> -->
				
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

								<div class="row" id="main_div_cal" >
									<div id="scheduler_here" class="dhx_cal_container">
										<div class="dhx_cal_navline">

											<div class="dhx_cal_prev_button">&nbsp;</div>
											<div class="dhx_cal_next_button">&nbsp;</div>
											<div class="dhx_cal_today_button"></div>
											<div class="dhx_cal_date"></div>

											<div class="egp_cal_navline_icon egp_minical_icon" id="dhx_minical_icon">
												<i class="fa fa-calendar fa-2x txt-color-blue"></i>
											</div>

											<div class="egp_cal_navline_icon egp_unit_icon " id="unit_tab" name="unit_tab">
												<i class="fa fa-columns fa-2x" style="color: grey;"></i>
											</div>

											<div class="egp_cal_navline_icon egp_agenda_icon " id="agenda_tab" name="agenda_tab">
												<i class="fa fa-list-ul fa-2x" style="color: grey;"></i>
											</div>

											<div class="egp_cal_navline_icon egp_event_icon" id="egp_event_icon">
												<i class="fa fa-flag fa-2x txt-color-pink"></i>
											</div>

											<!-- <div class="dhx_cal_tab" name="myplay_tab" id="myplay_tab" style="left:220px"></div> -->
										</div>
										<div class="dhx_cal_header"></div>
										<div class="dhx_cal_data"></div>
										<br />
									</div>
								</div> <!-- end row -->

							</div>

						</div> <!-- end row -->
					</div>
				</div> <!-- end Widget -->
			</div>
		</div>

	</div> <!-- end row -->

	<!-- ****************************** -->
	<!-- popup de reservation           -->

	<div id="resa_form_div" style="display:none;">
		<div id="container-fluid">
			<div id="loading_div" style="display:none;">
				<p> Traitement en cours...</p>
			</div>
			<form id="form" method="post">
				<div id="eventToAdd">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">

								<!-- ONGLETS ALLER/RETOUR -->
								<ul id="nav_tab_parcours" class="nav nav-tabs bordered">
									<li class="active">
										<a href="#tab_parcours" data-toggle="tab" aria-expanded="true">
											<i class="fa fa-fw fa-lg txt-color-blue fa-arrow-circle-right"></i>
											Aller
											<span class="badge bg-color-blue txt-color-white">Trou 1</span>
										</a>
									</li>
									<li class="">
										<a href="#tab_parcours" data-toggle="tab" aria-expanded="false">
											<i class="fa fa-fw fa-lg txt-color-blue fa-arrow-circle-left"></i>
											Retour
											<span class="badge bg-color-blue txt-color-white">Trou 10</span>
										</a>
									</li>
								</ul>

								<!-- CONTENU DES ONGLETS -->
								<div id="parcours_div" class="tab-content">

									<!-- CONTENU ONGLET ALLER -->
									<div class="tab-pane fade active in" id="tab_parcours">

										<!-- Global Hidden Inputs for that reservation -->
										<input type="hidden" name="id_reservation" id="id_reservation" class="serialize" />
										<input type="hidden" name="date_resa" id="date_resa" class="serialize" />
										<input type="hidden" name="heure_resa" id="heure_resa" class="serialize" />
										<input type="hidden" name="trou_depart" id="trou_depart" class="serialize" />
										<input type="hidden" name="event_type" id="event_type" class="serialize" />
										<input type="hidden" name="crud_mode" id="crud_mode" value="none" class="serialize" />
										<input type="hidden" name="user" id="user" class="serialize" />
										<!-- <input type="hidden" name="current_full_name" id="current_full_name" value="<?// echo $current_user_fullname?>" class="serialize" /> -->
										<!-- <input type="hidden" name="current_full_name" id="current_full_name" value="<?= $thisUserFullName?>" class="serialize" /> -->
										<input type="hidden" name="current_user_id" id="current_user_id" value="<?= $current_user_id?>" class="serialize" />
										<input type="hidden" name="isFormValid" id="isFormValid"  class="serialize" value="false">
										<input type="hidden" name="id_resa_provi_aller" id="id_resa_provi_aller"  class="serialize">
										<input type="hidden" name="id_resa_provi_retour" id="id_resa_provi_retour" class="serialize">

										<div type="text" id="eventStartDate"></div>
										<div type="text" id="game_type_div"></div>

										<div class="parcours_aller_div">

											<div class="players_div">

												<!-- Boucle principale sur les 4 joueurs possibles -->
												<? for($i = 1; $i <= 4; $i++) { // Boucle sur les 4 joueurs possibles ?>

													<?if($i == 1) {	// Joueur 1: Utilisateur courant
														if($isAdmin){
															$user_value = " value='' ";
															$user_id	= "2";	// utilisateur temporaire pour le moment
														}else{
															// $user_value = " value='" .$current_user_fullname ."' disabled ";
															$user_value = " value='" .$thisUserFullName ."' disabled ";
															$user_id	= $current_user_id;
														}
													}else {
														$user_value	= "";
														$user_id	= "";
													}?>

													<!-- User Hidden Inputs for that reservation -->
													<input type="hidden" name="crud_J<?= $i;?>" id="crud_J<?= $i;?>" value="none" class="serialize" />
													<input type="hidden" name="id_joueur<?=$i;?>" id="id_joueur<?=$i;?>" value="<?=$user_id;?>" class=" serialize" />
													<input type="hidden" name="nb_trous_J<?= $i;?>" id="nb_trous_J<?= $i;?>" value="18" class=" serialize" >

													<div class="<?= ($i % 2 == 0) ? "joueur_pair" : "joueur_impair"; ?> player_div" name="">

														<div class="input-group">

															<?if($i != 1) {?>
																<span class="input-group-btn btn_clear_user" id="btn_clear_user_<?=$i;?>" hidden>
																	<button class="btn btn-danger" type="button">
																		<i class="fa fa-remove"></i>
																	</button>
																</span>
															<?}?>

															<span class="input-group-addon"><?= $i;?></span>

															<input class="form-control" name="joueur<?= $i;?>" id="joueur<?= $i;?>" <?=$user_value;?> type="text">

															<span class="input-group-addon">
																<span class="onoffswitch">
																	<input type="checkbox" name="nbTrousJ<?= $i;?>" class="onoffswitch-checkbox nbTrousJ" id="nbTrousJ<?= $i;?>" checked>
																	<label class="onoffswitch-label" for="nbTrousJ<?= $i;?>">
																		<span class="onoffswitch-inner" data-swchon-text="18T" data-swchoff-text="9T"></span>
																		<span class="onoffswitch-switch"></span>
																	</label>
																</span>
															</span>

														</div>

														<div class="input-group">
															<div class="form-group">
																<label class="col-md-4 player_div control-label">options:</label>
																<div class="col-md-8 player_div">
																	<? if($isAdmin){?>

																		<label class="radio radio-inline">
																			<input type="checkbox" id="joueur<?= $i;?>_visiteur" class="radiobox"/>
																			<span class="visiteur_label<?=$i;?>"> Visiteur</span>
																		</label>

																		<? if($i > 1) {?>
																			<label class="radio radio-inline">
																				<input type="checkbox" id="joueur<?= $i;?>_invite" class="radiobox"/>
																				<span class="invite_label<?=$i;?>"> Invité</span>
																			</label>
																		<? }?>
																	<? }?>

																<? for($k = 0; $k < count($ressources); $k++) {?>
																	<label class="radio radio-inline">
																	<input type='checkbox' name='<?=$ressources[$k]['ressource'];?>[]' value='<?=$i-1;?>' id='<?=$ressources[$k]['ressource'];?>_<?=$i;?>' class='radiobox <?=$ressources[$k]['ressource'];?>_check serialize'/> 
																	<?=$ressources[$k]['ressource'];?>
																	</label>
																<?} // for k?>

																</div>
															</div>
														</div>

													</div>

												<? } // for i : Boucle sur les 4 joueurs possibles ?>

											</div>

										</div>

									</div>

								</div>

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">

								<div class="submit_div">
									<input type="submit" id="reserver_button" value="Réserver" style="display:none;"/>
									<input type="button" id="add_new_button"  value="Ajouter une partie" style="display:none;"/>
									<input type="button" id="update_button"   value="Mettre à jour" style="display:none;"/>
									<input type="button" id="delete_button"   value="Supprimer" style="display:none;"/>
									<input type="button" id="annuler_button"  value="Annuler"/>
								</div>

							</div>
						</div>
					</div>

				</div>

			</form>
		</div>
	</div>
