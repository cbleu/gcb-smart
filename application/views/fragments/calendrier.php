<!-- ****************************** -->
<!-- CALENDRIER: DHTML PART         -->
<!-- ****************************** -->

<!-- ****************************** -->
<!-- DOM fragment for calendar      -->

<div id="content" style="opacity:1;">

	<div class="row">

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

	<div id="resa_form_div" style="display:none;">
		<div id="loading_div" style="display:none;">
			<p> Traitement en cours...</p>
		</div>
		<form id="form" method="post">
			<!--<h1 class="reservation_title">Réservation</h1>-->
			<div id="eventToAdd">
				<div type="text" id="eventStartDate"></div>
				<div type="text" id="eventType"></div>
				<input type="button" id="flip_parcours_Button" value="Parcours Aller" />
				<input type="button" id="flip_parcours_Button2" value="Parcours Retour" />

				<input type="hidden" name="id_reservation" id="id_reservation" class="serialize" />
				<input type="hidden" name="type_resa" id="type_resa" class="serialize" />
				<input type="hidden" name="date_resa" id="date_resa" class="serialize" />
				<input type="hidden" name="heure_resa" id="heure_resa" class="serialize" />
				<input type="hidden" name="trou_depart" id="trou_depart" class="serialize" />
				<input type="hidden" name="new" id="new" value="0" class="serialize" />
				<input type="hidden" name="user" id="user" class="serialize" />
				<input type="hidden" name="current_full_name" id="current_full_name" value="<?= $current_user_fullname?>" class="serialize" />
				<input type="hidden" name="current_user_id" id="current_user_id" value="<?= $current_user_id?>" class="serialize" />
				<input type="hidden" name="isFormValid" id="isFormValid"  class="serialize" value="false">
				<input type="hidden" name="id_resa_provi_aller" id="id_resa_provi_aller"  class="serialize">
				<input type="hidden" name="id_resa_provi_retour" id="id_resa_provi_retour" class="serialize">
				<? for($i = 1; $i <= 4; $i++) {?>
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
					<div class="<?= ($i % 2 == 0) ? "joueur_pair" : "joueur_impair"; ?>">
						<label for="joueur<?= $i;?>">
							<span class="action_span"><span class="leave_button" tag=""  style="display:none;"> </span></span>
							<span class="big">Joueur <?= $i;?></span>
							<span class="nbTrousSpan">
								<input name="nbTrousJ<?= $i;?>" class="nbTrous9 serialize" type="radio" value="9" /> 9 Trous
								<input name="nbTrousJ<?= $i;?>" class="nbTrous18 serialize" type="radio" value="18" checked /> 18 Trous
							</span>
						</label>
						<input name="joueur<?= $i;?>" id="joueur<?= $i;?>" type="text" class="full-width joueur_input serialize" placeholder="Chercher un nom de membre ..." <?=$user_value;?>/>
							<span class="guest_span">
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
							</span>
							<p class="options">Options :
								<? for($k = 0; $k < count($ressources); $k++) {?>
									<input type='checkbox' name='<?=$ressources[$k]['ressource'];?>[]' value='<?=$i-1;?>' class='<?=$ressources[$k]['ressource'];?>_check serialize'/> <?=$ressources[$k]['ressource'];?>
								<?} // for k?>
							</p>
							<input type="hidden" name="id_joueur<?=$i;?>" id="id_joueur<?=$i;?>" value="<?=$user_id;?>" class=" serialize" />
							<input type="hidden" name="type_resa_J<?=$i;?>" id="type_resa_J<?=$i;?>" class="serialize" />
					</div>
				<? } // for i?>
				<div class="submit_div">
					<input type="submit" id="reserver_button" value="Réserver" style="display:none;"/>
					<input type="button" id="add_new_button"   value="Ajouter une partie" style="display:none;"/>
					<input type="button" id="update_button"   value="Mettre à jour" style="display:none;"/>
					<input type="button" id="delete_button"   value="Supprimer" style="display:none;"/>
					<input type="button" id="annuler_button"  value="Annuler"/>
				</div>
			</div>
		</form>
	</div>

