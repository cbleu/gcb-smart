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
											<div class="dhx_cal_today_button">&nbsp;</div>
											<div class="dhx_cal_date"></div>

											<div class="egp_cal_navline_icon egp_minical_icon" id="dhx_minical_icon">
												<i class="fa fa-calendar fa-2x "></i>
											</div>

											<? if(!$isMobile) { ?>


												<div class="egp_cal_navline_icon egp_unit_icon " id="unit_tab" name="unit_tab">
													<i class="fa fa-columns fa-2x" style="color: grey;"></i>
												</div>

												<div class="egp_cal_navline_icon egp_agenda_icon " id="agenda_tab" name="agenda_tab">
													<i class="fa fa-list-ul fa-2x" style="color: grey;"></i>
												</div>

												<? if($isAdmin){ ?>
													<div class="egp_cal_navline_icon egp_event_icon" id="egp_event_icon">
														<i class="fa fa-flag fa-2x txt-color-pink"></i>
													</div>
												<? } ?>

											<? }else{ ?>

												<div class="egp_cal_navline_icon egp_other_icon" id="dhx_other_icon">
													<i class="fa fa-th fa-2x"></i>
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp;<b class="caret"></b></a>
													<ul class="dropdown-menu">
														<li><a href="#">Aujourd'hui</a></li>
														<li><a href="#">Affichage Calendrier</a></li>
														<li><a href="#">Affichage Parties</a></li>
														<? if($isAdmin){ ?>
															<li class="divider"></li>
															<li><a href="#">Ajouter un evenement</a></li>
															<!-- <li><a href="#"></a></li> -->
														<? } ?>
													</ul>
												</div>


<!-- 												<div class="egp_cal_navline_icon egp_other_icon pull-left" id="dhx_other_icon">
													<a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tools"></i></a>
												</div>
 -->
<!-- 											<div class="btn-header pull-right egp_cal_navline_icon egp_other_icon" id="dhx_other_icon">
													<i class="fa fa-tools fa-2x txt-color-blue"></i>
												</div>
 -->
											<? } ?>

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
										<a href="#tab_parcours_aller" data-toggle="tab" aria-expanded="true">
											<i class="fa fa-fw fa-lg txt-color-blue fa-arrow-circle-right"></i>
											Aller
											<span class="badge bg-color-blue txt-color-white">Trou 1</span>
										</a>
									</li>
									<li class="">
										<a href="#tab_parcours_retour" data-toggle="tab" aria-expanded="false">
											<i class="fa fa-fw fa-lg txt-color-blue fa-arrow-circle-left"></i>
											Retour
											<span class="badge bg-color-blue txt-color-white">Trou 10</span>
										</a>
									</li>
								</ul>

								<!-- CONTENU DES ONGLETS -->
								<div id="parcours_div" class="tab-content">

									<!-- Global Hidden Inputs for that reservation -->
									<input type="hidden" name="id_reservation" id="id_reservation" class="serialize" />
									<input type="hidden" name="date_resa" id="date_resa" class="serialize" />
									<input type="hidden" name="heure_resa" id="heure_resa" class="serialize" />
									<input type="hidden" name="trou_depart" id="trou_depart" class="serialize" />
									<input type="hidden" name="event_type" id="event_type" class="serialize" />
									<input type="hidden" name="crud_mode" id="crud_mode" value="none" class="serialize" />
									<input type="hidden" name="current_user_id" id="current_user_id" value="<?= $current_user_id?>" class="serialize" />
									<input type="hidden" name="isFormValid" id="isFormValid"  class="serialize" value="false">
									<input type="hidden" name="id_resa_provi_aller" id="id_resa_provi_aller"  class="serialize">
									<input type="hidden" name="id_resa_provi_retour" id="id_resa_provi_retour" class="serialize">
									<input type="hidden" name="nb_joueurs" id="nb_joueurs" value="1" class="serialize">

									<!-- Boucle principale sur les 4 joueurs possibles -->
									<? for($p = 0; $p <= 4; $p+=4) { // Boucle sur les 2 demi-parcours ALLER et RETOUR ?>

										<!-- CONTENU ONGLET ALLER ou RETOUR -->
										<div class="tab-pane fade <?= $p == 0 ? "active" : ""; ?> in" id="tab_parcours<?= $p == 0 ? "_aller" : "_retour"; ?>" >

											<!-- <div type="text" id="eventStartDate"></div> -->
											<div type="text" id="ev_begin_date<?= $p == 0 ? "_aller" : "_retour"; ?>"></div>
											<div type="text" id="ev_game_type<?= $p == 0 ? "_aller" : "_retour"; ?>"></div>

											<div class="div_parcours<?= $p == 0 ? "_aller" : "_retour"; ?>" >

												<div class="players_div">

													<!-- Boucle principale sur les 4 joueurs possibles -->
													<? for($i = 1; $i <= 4; $i++) { // Boucle sur les 4 slots possibles $p etant pour l'aller (1-4) et le retour (5-8) '?>
														<? $slot = $i + $p;?>

														<div class="<?= ($i % 2 == 0) ? "joueur_pair" : "joueur_impair"; ?> player_div" name="J<?= $slot;?>">

															<div class="input-group hidden-group">
																<!-- User Hidden Inputs for that reservation -->
																<input type="hidden" name="crud_J<?= $slot;?>" id="crud_J<?= $slot;?>" class="serialize" />
																<!-- <input type="hidden" name="id_J<?=$i;?>" id="id_J<?=$i;?>" value="<?//= $user_id;?>" class=" serialize" /> -->
																<input type="hidden" name="id_J<?=$slot;?>" id="id_J<?=$slot;?>" class=" serialize" />
																<input type="hidden" name="nb_trous_J<?= $slot;?>" id="nb_trous_J<?= $slot;?>" class=" serialize" >
																<input type="hidden" name="res_J<?= $slot;?>" id="res_J<?= $slot;?>" class=" serialize" >
															</div>

															<div class="input-group name-group">

																<span class="input-group-btn btn_clear_user" id="btn_clear_user_<?=$slot;?>" hidden>
																	<button class="btn btn-danger" type="button">
																		<i class="fa fa-remove"></i>
																	</button>
																</span>

																<span class="input-group-addon"><?= $slot;?></span>

																<input class="form-control serialize" name="joueur<?= $slot;?>" id="joueur<?= $slot;?>" type="text" >

																<span class="input-group-addon">
																	<span class="onoffswitch">
																		<input type="checkbox" name="nbTrousJ<?= $slot;?>" class="onoffswitch-checkbox nbTrousJ" id="nbTrousJ<?= $slot;?>">
																		<label class="onoffswitch-label" for="nbTrousJ<?= $slot;?>">
																			<span class="onoffswitch-inner" data-swchon-text="18T" data-swchoff-text="9T"></span>
																			<span class="onoffswitch-switch"></span>
																		</label>
																	</span>
																</span>

															</div>

															<div class="input-group options-group">
																<!-- <div class="form-group"> -->
																	<!-- <label class="col-md-4 player_div control-label">options:</label> -->
																	<div class="col-md-8 player_div">
																		<? if($isAdmin){?>

																			<label class="radio radio-inline">
																				<input type="checkbox" id="joueur<?= $slot;?>_visiteur" class="radiobox"/>
																				<span class="visiteur_label<?=$slot;?>"> Visiteur</span>
																			</label>

																			<? if($i > 1) {?>
																				<label class="radio radio-inline">
																					<input type="checkbox" id="joueur<?= $slot;?>_invite" class="radiobox"/>
																					<span class="invite_label<?=$slot;?>"> Invité</span>
																				</label>
																			<? }?>
																		<? }?>

																	<? for($k = 0; $k < count($ressources); $k++) {?>
																		<label class="radio radio-inline">
																		<input type='checkbox' name='<?=$ressources[$k]['ressource'];?>[]' value='<?=$i-1;?>' id='<?=$ressources[$k]['ressource'];?>_<?=$slot;?>' class='radiobox <?=$ressources[$k]['ressource'];?>_check serialize'/> 
																		<?=$ressources[$k]['ressource'];?>
																		</label>
																	<?} // for k?>

																	</div>
																<!-- </div> -->
															</div>

														</div>

													<? } // for i : Boucle sur les 4 joueurs possibles ?>

												</div>	<!-- END .players_div -->

											</div>	<!-- END .div_parcours_xxxx -->

										</div>	<!-- END #tab_parcours -->

									<? }?>	<!-- boucle sur p: les parcours ALLER p=1 et RETOUR p =2 -->

								</div>

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">

								<div class="submit_div">
									<input type="submit" id="reserver_button"	value="Réserver" style="display:none;"/>
									<input type="button" id="edit_button"		value="Modifier" style="display:none;"/>
									<input type="button" id="add_new_button"	value="Ajouter une partie" style="display:none;"/>
									<input type="button" id="update_button"		value="Mettre à jour" style="display:none;"/>
									<input type="button" id="delete_button"		value="Supprimer" style="display:none;"/>
									<input type="button" id="annuler_button"	value="Annuler"/>
								</div>

							</div>
						</div>
					</div>

				</div>

			</form>
		</div>
	</div>
