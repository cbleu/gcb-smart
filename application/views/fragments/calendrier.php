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


	<!-- Modal -->
	<div class="modal fade" id="modal_resa_form_div" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h2 class="modal-title" id="myModalLabel"><i class="fa fa-th-list"></i> Réservation sélectionnée</h2>
				</div>

				<div class="modal-body">

					<div id="container-fluid">

						<form id="form" method="post">

							<div class="row">
								<div class="col-md-12">

										<!-- Global Hidden Inputs for that reservation -->
										<div>
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
										</div>
										<!-- End Global Hidden Inputs-->

										<!-- collapse -->
										<div class="panel-group smart-accordion-default" id="parcours_AR" role="tablist" aria-multiselectable="true">

											<!-- Boucle sur les parcours -->
											<? for($p = 0; $p <= 4; $p+=4) { // Boucle sur les 2 demi-parcours ALLER et RETOUR ?>

												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading-<?= $p == 0 ? "aller" : "retour"; ?>">
														<h4 class="panel-title parcours-<?= $p == 0 ? "aller" : "retour"; ?>">
															<a class="accordion-toggle <?= $p == 0 ? "" : "collapsed"; ?>" data-toggle="collapse" data-parent="#parcours_AR" href="#parcours_<?= $p == 0 ? "aller" : "retour"; ?>"  aria-expanded="<?= $p == 0 ? "true" : "false"; ?>" aria-controls="parcours_<?= $p == 0 ? "aller" : "retour"; ?>">
																<i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i>
																<span class="badge span-start-hole-<?= $p == 0 ? "aller" : "retour"; ?> bg-color-blue txt-color-white"></span>
																<span class="parcours-heading-label-<?= $p == 0 ? "aller" : "retour"; ?>"><!-- Parcours: <strong><?= $p == 0 ? "aller" : "retour"; ?></strong> --></span>
															</a>
														</h4>
													</div>

													<div id="parcours_<?= $p == 0 ? "aller" : "retour"; ?>" class="panel-collapse collapse <?= $p == 0 ? "in" : ""; ?>" role="tabpanel" aria-labelledby="heading-<?= $p == 0 ? "aller" : "retour"; ?>" >
														<div class="panel-body">

															<div type="text" id="ev_begin_date<?= $p == 0 ? "_aller" : "_retour"; ?>"></div>
															<!-- <div type="text" id="ev_game_type<?= $p == 0 ? "_aller" : "_retour"; ?>"></div> -->

															<div class="players-div">

																<!-- Boucle principale sur les 4 joueurs possibles -->
																<? for($i = 1; $i <= 4; $i++) { // Boucle sur les 4 slots possibles $p etant pour l'aller (1-4) et le retour (5-8) '?>
																	<? $slot = $i + $p;?>

																	<div class="<?= ($i % 2 == 0) ? "joueur-pair" : "joueur-impair"; ?> player-div" name="J<?= $slot;?>">

																		<div class="input-group hidden-group">
																			<!-- User Hidden Inputs for that reservation -->
																			<input type="hidden" name="crud_J<?= $slot;?>" id="crud_J<?= $slot;?>" class="serialize" />
																			<input type="hidden" name="id_J<?=$slot;?>" id="id_J<?=$slot;?>" class=" serialize" />
																			<input type="hidden" name="nb_trous_J<?= $slot;?>" id="nb_trous_J<?= $slot;?>" class=" serialize" >
																			<input type="hidden" name="res_J<?= $slot;?>" id="res_J<?= $slot;?>" class=" serialize" >
																		</div> 	<!-- hidden-group -->

																		<div class="input-group name-group">

																			<span class="input-group-btn btn_clear_user" id="btn_clear_user_<?=$slot;?>" hidden>
																				<button class="btn btn-danger" type="button">
																					<i class="fa fa-remove"></i>
																				</button>
																			</span>

																			<span class="input-group-addon parcours-<?= $p == 0 ? 'aller' : 'retour'; ?>"><?= $slot;?></span>

																			<input class="form-control serialize" name="joueur<?= $slot;?>" id="joueur<?= $slot;?>" type="text" >

																			<span class="input-group-addon parcours-<?= $p == 0 ? 'aller' : 'retour'; ?>">
																				<span class="onoffswitch">
																					<input type="checkbox" name="nbTrousJ<?= $slot;?>" class="onoffswitch-checkbox nbTrousJ" id="nbTrousJ<?= $slot;?>">
																					<label class="onoffswitch-label" for="nbTrousJ<?= $slot;?>">
																						<span class="onoffswitch-inner" data-swchon-text="18T" data-swchoff-text="9T"></span>
																						<span class="onoffswitch-switch"></span>
																					</label>
																				</span>
																			</span>

																		</div> 	<!-- name-group -->

																		<div class="input-group options-group">
																			<div class="col-md-8 player-div">
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
																		</div> 	<!-- options-group -->

																	</div> <!-- joueur-(im)pair -->

																<? } // for i : Boucle sur les 4 joueurs possibles ?>

															</div>	<!-- END .players-div -->

														</div>
													</div>

												</div>

											<? }?>	<!-- for p: les parcours ALLER p=0 et RETOUR p =4 -->

										</div>
										<!-- collapse -->

								</div>	<!-- col -->
							</div>	<!-- row -->

							<div class="modal-footer">

								<button type="submit" id="reserver_button"	class="btn btn-success" data-dismiss="modal" style="display:none;">Réserver</button>
								<button type="button" id="edit_button"		class="btn btn-warning" style="display:none;">Modifier</button>
								<button type="button" id="add_new_button"	class="btn btn-primary" style="display:none;">Ajouter une partie</button>
								<button type="button" id="update_button"	class="btn btn-success" data-dismiss="modal" style="display:none;">Mettre à jour</button>
								<button type="button" id="delete_button"	class="btn btn-danger" data-dismiss="modal" style="display:none;">Supprimer</button>
								<button type="button" id="annuler_button"	class="btn btn-default" data-dismiss="modal" >Annuler</button>

							</div>

						</form>

					</div> <!-- container-fluid -->

				</div>	<!-- modal-body -->

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

</div>
