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

								<a href="" data-toggle="modal" data-target="#resa_form_div" class="btn btn-primary btn-lg">
									Launch remote modal
								</a>
								<div class="row" id="main_div_cal" >
									<!-- <div id="left_col">
										<div id="cal_here"></div>
										<div id="logo_here">
											<img src="/assets/img/gcb/logo-gcb.jpg" style="width:200px;">
										</div>
									</div> -->
									<div id="scheduler_here" class="dhx_cal_container">
										<div class="dhx_cal_navline">

											<!-- <input type="button" value="Programmer un évènement" id="recurring_button"/> -->

											<div class="dhx_cal_prev_button">&nbsp;</div>
											<div class="dhx_cal_next_button">&nbsp;</div>
											<div class="dhx_cal_today_button"></div>
											<div class="dhx_cal_date"></div>
											<!-- <div class="dhx_cal_tab" name="unit_tab" id="unit_tab" style="left:0px"></div> -->
											<!-- <div class="dhx_cal_tab" name="agenda_tab" id="agenda_tab" style="left:78px"><i class="fa fa-list-ul fa-2x" style="color: grey;"></i></div> -->

											<!-- <div class="dhx_minical_icon egp_cal_navline_icon" id="dhx_minical_icon"> -->
											<div class="egp_cal_navline_icon egp_minical_icon" id="dhx_minical_icon">
												<i class="fa fa-calendar fa-2x txt-color-blue"></i>
												<!-- <span class="fa-stack fa-2x">
													<i class="fa fa-square-o fa-stack-2x txt-color-grey" style="color: grey; font-weight: ligther;"></i>
													<i class="fa fa-calendar fa-stack-1x txt-color-blue"></i>
												</span> -->
											</div>

											<div class="egp_cal_navline_icon egp_unit_icon " id="unit_tab" name="unit_tab">
												<i class="fa fa-columns fa-2x" style="color: grey;"></i>
											</div>

											<div class="egp_cal_navline_icon egp_agenda_icon " id="agenda_tab" name="agenda_tab">
												<i class="fa fa-list-ul fa-2x" style="color: grey;"></i>
											</div>

											<div class="egp_cal_navline_icon egp_event_icon" id="egp_event_icon">
												<i class="fa fa-flag fa-2x txt-color-pink"></i>
												<!-- <span class="fa-stack fa-lg">
													<i class="fa fa-square-o fa-stack-2x txt-color-grey"></i>
													<i class="fa fa-flag fa-stack-1x txt-color-pink"></i>
												</span> -->

												<!-- <i class="fa fa-flag fa-2x txt-color-pink"></i> -->
											</div>

											<!-- <div class="dhx_cal_tab" name="myplay_tab" id="myplay_tab" style="left:178px"></div> -->
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

	<!-- <div class="modal" id="resa_form_div" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title" id="myModalLabel">Article Post</h4>
				</div> -->
	<div id="resa_form_div" style="display:none;">
		<div id="container-fluid">
			<div id="loading_div" style="display:none;">
				<p> Traitement en cours...</p>
			</div>
			<form id="form" method="post">
				<!--<h1 class="reservation_title">Réservation</h1>-->
				<div id="eventToAdd">

					<input type="hidden" name="id_reservation" id="id_reservation" class="serialize" />
					<input type="hidden" name="date_resa" id="date_resa" class="serialize" />
					<input type="hidden" name="heure_resa" id="heure_resa" class="serialize" />
					<input type="hidden" name="trou_depart" id="trou_depart" class="serialize" />
					<input type="hidden" name="event_type" id="event_type" class="serialize" />
					<input type="hidden" name="game_type" id="game_type" class="serialize" />
					<input type="hidden" name="crud_mode" id="crud_mode" value="none" class="serialize" />
					<!-- <input type="hidden" name="new" id="new" value="0" class="serialize" /> -->
					<input type="hidden" name="user" id="user" class="serialize" />
					<input type="hidden" name="current_full_name" id="current_full_name" value="<?= $current_user_fullname?>" class="serialize" />
					<input type="hidden" name="current_user_id" id="current_user_id" value="<?= $current_user_id?>" class="serialize" />
					<input type="hidden" name="isFormValid" id="isFormValid"  class="serialize" value="false">
					<input type="hidden" name="id_resa_provi_aller" id="id_resa_provi_aller"  class="serialize">
					<input type="hidden" name="id_resa_provi_retour" id="id_resa_provi_retour" class="serialize">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">

								<ul id="tab_parcours" class="nav nav-tabs bordered">
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
									<!-- <li class="pull-right">
										<a href="javascript:void(0);">
										<div class="sparkline txt-color-pinkDark text-align-right" data-sparkline-height="18px" data-sparkline-width="90px" data-sparkline-barwidth="7"><canvas width="52" height="18" style="display: inline-block; width: 52px; height: 18px; vertical-align: top;"></canvas></div> </a>
									</li> -->
								</ul>

								<div id="parcours_div" class="tab-content">

									<div class="tab-pane fade active in" id="tab_parcours_aller">

										<div type="text" id="eventStartDate"></div>
										<div type="text" id="eventType"></div>

										<div class="parcours_aller_div">

											<div class="players_div">

												<? for($i = 1; $i <= 4; $i++) { // Boucle sur les 4 joueurs possibles ?>
													<?if($i == 1) {	// Joueur 1: Utilisateur courant
														if($isAdmin){
															$user_value = " value='' disabled ";
															$user_id	= "2";	// utilisateur temporaire pour le moment
														}else{
															$user_value = " value='" .$current_user_fullname ."' disabled ";
															$user_id	= $current_user_id;
														}
													}else {
														$user_value	= "";
														$user_id	= "";
													}?>
													<!-- <div class="<?= ($i % 2 == 0) ? "joueur_pair" : "joueur_impair"; ?> joueur_div "> -->
													<div class="<?= ($i % 2 == 0) ? "joueur_pair" : "joueur_impair"; ?> col-sm-12 player_div">

														<input type="hidden" name="crud_J<?= $i;?>" id="crud_J<?= $i;?>" value="none" class="serialize" />

														<!-- <div class="input-group">
															<span class="input-group-addon"><?= $i;?></span>
															<input class="form-control serialize" name="joueur<?= $i;?>" id="joueur<?= $i;?>" placeholder="Joueur <?= $i;?>: taper un nom ... "  <?=$user_value;?> type="text">
														</div> -->

														<!-- <div class="col-sm-12 player_div"> -->
														<div class="input-group">

															<!-- <div class="input-group-btn open">
																<button type="button" class="btn btn-info" tabindex="-1">Membre</button>
																<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" tabindex="-1" aria-expanded="true">
																	<span class="caret"></span>
																</button>
																<ul class="dropdown-menu pull-right" role="menu">
																	<li><a href="javascript:void(0);">Membre</a></li>
																	<li><a href="javascript:void(0);">Invité</a></li>
																	<li><a href="javascript:void(0);">Visiteur</a></li>
																	<li class="divider"></li>
																	<li><a href="javascript:void(0);">Supprimer</a></li>
																</ul>
															</div> -->

															<?if($i != 1) {?>
																<span class="input-group-btn btn_clear_user_<?=$i;?> hidden">
																	<button class="btn btn-danger" type="button">
																		<i class="fa fa-remove"></i>
																	</button>
																</span>
															<?}?>

															<span class="input-group-addon"><?= $i;?></span>

															<input class="form-control" name="joueur<?= $i;?>" id="joueur<?= $i;?>" <?=$user_value;?> type="text">

															<input type="hidden" name="id_joueur<?=$i;?>" id="id_joueur<?=$i;?>" value="<?=$user_id;?>" class=" serialize" />
															<!-- <input type="hidden" name="type_resa" id="type_resa" class="serialize" /> -->

															<input type="hidden" name="nb_trous_J<?= $i;?>" id="nb_trous_J<?= $i;?>" value="18" class=" serialize" >
															<span class="input-group-addon">
																<span class="onoffswitch">
																	<!-- <input type="checkbox" name="nbTrousJ<?= $i;?>" class="onoffswitch-checkbox serialize" id="nbTrousJ<?= $i;?>" checked value="18"> -->
																	<input type="checkbox" name="nbTrousJ<?= $i;?>" class="onoffswitch-checkbox nbTrousJ" id="nbTrousJ<?= $i;?>" checked>
																	<label class="onoffswitch-label" for="nbTrousJ<?= $i;?>">
																		<span class="onoffswitch-inner" data-swchon-text="18T" data-swchoff-text="9T"></span>
																		<span class="onoffswitch-switch"></span>
																	</label>
																</span>
															</span>

														</div>
														<!-- </div> -->

														<!-- <div class="input-group nbTrousSpan">
															<input name="nbTrousJ<?= $i;?>" class="nbTrous9 serialize" type="radio" value="9" /> 9 Trous: Aller simple
															<input name="nbTrousJ<?= $i;?>" class="nbTrous18 serialize" type="radio" value="18" checked /> 18 Trous: Aller/Retour
														</div> -->

														<!-- <label for="joueur<?= $i;?>">
															<span class="action_span"><span class="leave_button" tag=""  style="display:none;"> </span></span>
															<span class="big">Joueur <?= $i;?></span>
															<span class="nbTrousSpan">
																<input name="nbTrousJ<?= $i;?>" class="nbTrous9 serialize" type="radio" value="9" /> 9 Trous
																<input name="nbTrousJ<?= $i;?>" class="nbTrous18 serialize" type="radio" value="18" checked /> 18 Trous
															</span>
														</label> -->
														<!-- <input name="joueur<?= $i;?>" id="joueur<?= $i;?>" type="text" class="full-width joueur_input serialize" placeholder="Chercher un nom de membre ..." <?=$user_value;?>/> -->

														<div class="input-group">
															<div class="form-group">
																<label class="col-md-4 player_div control-label">options:</label>
																<div class="col-md-8 player_div">
																	<? if($isAdmin){?>

																	<label class="radio radio-inline">
																		<input type="checkbox" id="joueur<?= $i;?>_visiteur" class="radiobox"/>
																		<span class="visiteur_label<?=$i;?>"> Visiteur</span>
																	</label>
																	<? }?>

																	<? if($i > 1) {?>
																		<label class="radio radio-inline">
																			<input type="checkbox" id="joueur<?= $i;?>_invite" class="radiobox"/>
																			<span class="invite_label<?=$i;?>"> Invité</span>
																		</label>
																	<? }?>

																<? for($k = 0; $k < count($ressources); $k++) {?>
																	<label class="radio radio-inline">
																	<input type='checkbox' name='<?=$ressources[$k]['ressource'];?>[]' value='<?=$i-1;?>' class='radiobox <?=$ressources[$k]['ressource'];?>_check serialize'/> 
																	<?=$ressources[$k]['ressource'];?>
																	</label>
																<?} // for k?>

																</div>
															</div>
														</div>

																<!-- <span class="guest_span">
																	<? if($i > 1) {?>
																		<? if($isAdmin){?>
																			<input type="checkbox" id="joueur<?= $i;?>_invite" class="guest_checkbox"/>
																			<span class="invite_label<?=$i;?>"> Invité</span><br />
																		<? }?>
																	<? }?>
																	<? if($isAdmin){?>
																		<input type="checkbox" id="joueur<?= $i;?>_visiteur" class="visiteur_checkbox"/>
																		<span class="visiteur_label<?=$i;?>"> Visiteur</span>
																	<? }?>
																</span> -->

														<!-- <div class="col-sm-12"> -->
															<!-- <div class="input-group">
																<p class="options">Options :
																	<? for($k = 0; $k < count($ressources); $k++) {?>
																		<input type='checkbox' name='<?=$ressources[$k]['ressource'];?>[]' value='<?=$i-1;?>' class='<?=$ressources[$k]['ressource'];?>_check serialize'/>
																		<?=$ressources[$k]['ressource'];?>
																	<?} // for k?>
																</p>
																<input type="hidden" name="id_joueur<?=$i;?>" id="id_joueur<?=$i;?>" value="<?=$user_id;?>" class=" serialize" />
																<input type="hidden" name="type_resa_game_type" id="type_resa_game_type" class="serialize" />
															</div> -->
														<!-- </div> -->

													</div>

												<? } // for i : Boucle sur les 4 joueurs possibles ?>

											</div>

										</div>

									</div>

									<div class="tab-pane fade" id="tab_parcours_retour">
										<p>
											En cours de développement !
										</p>
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

	<!-- Modal -->
	<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title" id="myModalLabel">Article Post</h4>
				</div>

				<div class="modal-body">
	
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Title" required />
							</div>
							<div class="form-group">
								<textarea class="form-control" placeholder="Content" rows="5" required></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="category"> Category</label>
								<select class="form-control" id="category">
									<option>Articles</option>
									<option>Tutorials</option>
									<option>Freebies</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tags"> Tags</label>
								<input type="text" class="form-control" id="tags" placeholder="Tags" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="well well-sm well-primary">
								<form class="form form-inline " role="form">
									<div class="form-group">
										<input type="text" class="form-control" value="" placeholder="Date" required />
									</div>
									<div class="form-group">
										<select class="form-control">
											<option>Draft</option>
											<option>Published</option>
										</select>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success btn-sm">
											<span class="glyphicon glyphicon-floppy-disk"></span> Save
										</button>
										<button type="button" class="btn btn-default btn-sm">
											<span class="glyphicon glyphicon-eye-open"></span> Preview
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
	
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cancel
					</button>
					<button type="button" class="btn btn-primary">
						Post Article
					</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
