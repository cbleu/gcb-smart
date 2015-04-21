<!-- ****************************** -->
<!-- WIZARD: DHTML PART             -->
<!-- ****************************** -->

<!-- ****************************** -->
<!-- DOM fragment for Wizard template -->

<div id="content" style="opacity:1;">
	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark"><i class="fa fa-pencil-square-o fa-fw "></i> Réservation <span>>
			<!-- <h1 class="page-title txt-color-blueDark">
				<span class="fa-stack fa-lg">
				  <i class="fa fa-square-o fa-stack-2x"></i>
				  <i class="fa fa-magic fa-stack-1x"></i>
				</span>
				Assistant <span>> -->
				Assistant </span></h1>
		</div>
	</div><!--end row-->

	<div class="row">

		<!-- NEW WIDGET START -->
		<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> -->
		<div class="col-sm-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-magic"></i> </span>
					<h2>Assistant de réservation</h2>
				</header>
				
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
								<form id="wizard-1" novalidate="novalidate">
									<div id="bootstrap-wizard-1" class="col-sm-12">
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
												<br>
												<h3><strong>Etape 1 </strong> - Le Jour</h3>
												<div class="row">
													<!-- <div class="col-sm-3">
													</div> -->
													<div class="col-md-6 col-md-offset-3 col-centered">
														<div class="form-group">
															<div class="input-group col-centered">
																<span class="input-group-addon"><i class="fa fa-calendar fa-lg fa-fw"></i></span>
																<input type="text" id="date_resa" name="date_resa" readonly placeholder="Choisir une date" class="form-control input-lg serialize"/>
																<!-- <input class="form-control input-lg" placeholder="email@address.com" type="text" name="email" id="email"> -->
															</div>
														</div>
													</div>
													<!-- <div class="col-sm-3">
													</div> -->
												</div><!--end row-->
												<div class="row">
													<!-- <div class="col-sm-3">
													</div> -->
													<div class="col-md-6 col-md-offset-3 col-centered">
														<!-- <div class="form-group"> -->
															<!-- <div class="input-group"> -->
																<!-- <span class="input-group-addon"><i class="fa fa-lg fa-fw"></i></span> -->
														<div id="datepicker-container">
														  <div id="datepicker-center">
														    <div id="datepicker"></div>
														  </div>
														</div>
																<!-- <div id="datepicker"></div> -->
																<!-- <input class="form-control input-lg" placeholder="First Name" type="text" name="fname" id="fname"> -->
															<!-- </div> -->
														<!-- </div> -->
													</div>
													<!-- <div class="col-sm-3">
													</div> -->
												</div><!--end row-->
											</div>

											<!-- ****************************** -->
											<!-- Page 2 Parcours                -->
											<div class="tab-pane" id="tab2">
												<br>
												<h3><strong>Etape 2</strong> - L'horaire et le parcours</h3>
												<div class="row">

													<div class="col-sm-4">
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
													</div>

													<div class="col-sm-4">
														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon"><i class="fa fa-flag fa-lg fa-fw"></i></span>
																<select id="heure_resa" name="heure_resa" class="form-control select multiple-select serialize">
																	<optgroup id="nb_trous_optgroup" label="18 Trous"></optgroup>
																</select>
															</div>
														</div>
													</div>

													<input type="hidden" name="nb_trous" id="nb_trous" class="serialize" value="18" />

												</div>

											</div>

											<!-- ****************************** -->
											<!-- Page 3 Joueurs                 -->
											<div class="tab-pane" id="tab3">
												<br>
												<h3><strong>Etape 3</strong> - Les joueurs</h3>
												<div class="row">

													<input type="hidden" id="places_dispo" value="4">

													<? if($isLogged){?>
														<!-- fieldset for members -->
														<? for($i = 1; $i <= 4; $i++) { ?>
															<div class="control-group" style="margin-bottom: 20px">
																<label class="control-label big" for='joueur<?=$i;?>'>Joueur #<?=$i;?></label>
																<div class="controls">
																	<input type="text" placeholder="Chercher un nom..." id="joueur<?=$i;?>" name="joueur<?=$i;?>" class="span5 joueur_input" value="<?=$players[$i]['name'];?>" <?=$players[$i]['tags'];?> style="height: 30px"/>
																	<?php for($k = 0; $k < count($ressources); $k++) {
																		echo "<input type='checkbox' name='" .$ressources[$k]['ressource'] ."[]' class='" .$ressources[$k]['ressource'] ."_check cb_ressource_" .$i ." serialize' value='" .($i - 1) ."' /> " .$ressources[$k]['ressource'];
																	} ?>
																	<? if($isAdmin && $i ==1){?>
																		<input type="hidden" name="id_joueur1" id="id_joueur1" class="serialize" value="2">
																	<? }else{ ?>
																		<input type="hidden" name="id_joueur<?=$i;?>" id="id_joueur<?=$i;?>" class="serialize" value="<?=$players[$i]['id'];?>">
																	<? } ?>
																	<input type="hidden" name="nbTrousJ<?=$i;?>" id="nbTrousJ<?=$i;?>" class="serialize" value="">
																</div>
															</div>
														<? } ?>
														<input type="hidden" name="nb_joueurs" id="nb_joueurs" class="serialize">
													<? }else{?>
														<!-- fieldset for public -->
														<div class="control-group">
															<label class="control-label big" for="nb_joueurs">Joueurs et ressources</label>
															<div class="controls" style="margin: 20px">
																<span class="control-label big" for="nb_joueurs" style="padding-right: 20px; margin-right: 30px;">Nombre de joueurs</span>
																<input type="radio" name="nb_joueurs" class="nb_joueurs serialize" id="nb_joueurs_1" value="1" checked /> 1
																<input type="radio" name="nb_joueurs" class="nb_joueurs serialize" id="nb_joueurs_2" value="2" /> 2
																<input type="radio" name="nb_joueurs" class="nb_joueurs serialize" id="nb_joueurs_3" value="3" /> 3
																<input type="radio" name="nb_joueurs" class="nb_joueurs serialize" id="nb_joueurs_4" value="4" /> 4
																<input type="hidden" name="id_joueur1" id="id_joueur1" class="serialize" value="1">
															</div>
				
															<? for($k = 0; $k < count($ressources); $k++) { ?>
																<!-- <div class="control-group"> -->
																	<!-- <label class="control-label big" for="nb_<?= $ressources[$k]['ressource'];?>">Nombre de <?= $ressources[$k]['ressource'];?>s</label> -->
																	<div class="controls" style="margin: 20px">
																	<!-- <div class="controls"> -->
																		<span class="control-label big" for="nb_<?= $ressources[$k]['ressource'];?>" style="padding-right: 20px">Nombre de <?= $ressources[$k]['ressource'];?>s</span>
																		<? for($i = 0; $i <= $ressources[$k]['qte_max_par_partie']; $i++) { ?>
																			<input type="radio" name="nb_<?=$ressources[$k]['ressource'];?>s" class="serialize nb_<?= $ressources[$k]['ressource'];?>s" name="nb_<?=  $ressources[$k]['ressource'];?>s"  value="<?=$i;?>" <?=($i == 0) ? "checked" : "";?>/> <?=$i;?>
																		<? } ?>
																	</div>
																<!-- </div> -->
															<? } // for $k?>
														</div>

														<!-- <fieldset class="sectionwrap"  style="width:680px;"> -->
															<legend>Coordonnées</legend>
				
															<input type="hidden" id="places_dispo" value="4">
				
															<div class="control-group">
																<label class="control-label big" for="client_name">Nom * </label>
																<div class="controls">
																	<input type="text" id="client_name" name="client_name" class="span5 joueur_input serialize"/>
																</div>
															</div>
					
															<div class="control-group">
																<label class="control-label big" for="client_firstname">Prénom * </label>
																<div class="controls">
																	<input type="text" id="client_firstname" name="client_firstname" class="span5 joueur_input serialize"/>
																</div>
															</div>
					
															<div class="control-group">
																<label class="control-label big" for="client_email">E-mail * </label>
																<div class="controls">
																	<input type="text" id="client_email" name="client_email" class="span5 joueur_input serialize"/>
																</div>
															</div>
					
															<div class="control-group">
																<label class="control-label big" for="client_phone">Téléphone</label>
																<div class="controls">
																	<input type="text" id="client_phone" name="client_phone" class="span5 joueur_input serializes"/>
																</div>
															</div>
															<div id="selection"></div>
														<!-- </fieldset> -->
													<? }?>

												</div>
											</div>

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
														<div id="reservation_done" class="controls" style="display:none;">Votre réservation à bien été faite.</div>
													</div>
												</div>

												<br>
												<h1 class="text-center text-success"><strong><i class="fa fa-check fa-lg"></i> Complete</strong></h1>
												<h4 class="text-center">Click next to finish</h4>
												<br>
												<br>
											</div>

											<div class="form-actions">
												<div class="row" name="boutons-wizard">
													<div class="col-sm-12">
														<ul class="pager wizard no-margin">
															<!--<li class="previous first disabled">
															<a href="javascript:void(0);" class="btn btn-lg btn-default"> First </a>
															</li>-->
															<li class="previous disabled">
																<a href="javascript:void(0);" class="btn btn-lg btn-default"> Précédent </a>
															</li>
															<!--<li class="next last">
															<a href="javascript:void(0);" class="btn btn-lg btn-primary"> Last </a>
															</li>-->
															<li class="next">
																<a href="javascript:void(0);" class="btn btn-lg txt-color-darken"> Suivant </a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- Fin contenu des etapes-->
									</div>
								</form>
								<!-- Fin du Formulaire du Wizard -->
							</div>
						</div>
					</div>
					<!-- end widget content -->
				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
			
		</div>
		<!-- WIDGET END -->

		<!-- <div class="col-sm-12">
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-3" data-widget-editbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-check"></i> </span>
					<h2>Very Basic Wizard Example </h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body">
						<div class="row">
							<form id="wizard-3" novalidate="novalidate">
								<div id="bootstrap-wizard-3" class="col-sm-12">
									<div class="form-bootstrapWizard">
										<ul class="bootstrapWizard form-wizard">
											<li class="active" data-target="#step1">
												<a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Basic information</span> </a>
											</li>
											<li data-target="#step2">
												<a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Billing information</span> </a>
											</li>
											<li data-target="#step3">
												<a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Domain Setup</span> </a>
											</li>
											<li data-target="#step4">
												<a href="#tab4" data-toggle="tab"> <span class="step">4</span> <span class="title">Save Form</span> </a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="tab31">
											<br>
											<h3><strong>Step 1 </strong> - Basic Information</h3>
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-envelope fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" placeholder="email@address.com" type="text" name="email" id="email">

														</div>
													</div>

												</div>

											</div>

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-user fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" placeholder="First Name" type="text" name="fname" id="fname">

														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-user fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" placeholder="Last Name" type="text" name="lname" id="lname">

														</div>
													</div>
												</div>
											</div>

										</div>
										<div class="tab-pane" id="tab32">
											<br>
											<h3><strong>Step 2</strong> - Billing Information</h3>

											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-flag fa-lg fa-fw"></i></span>
															<select name="country" class="form-control input-lg">
																<option value="" selected="selected">Select Country</option>
																<option value="United States">United States</option>
																<option value="United Kingdom">United Kingdom</option>
																<option value="Afghanistan">Afghanistan</option>
																<option value="Albania">Albania</option>
																<option value="Algeria">Algeria</option>
																<option value="American Samoa">American Samoa</option>
																<option value="Andorra">Andorra</option>
																<option value="Angola">Angola</option>
																<option value="Anguilla">Anguilla</option>
																<option value="Antarctica">Antarctica</option>
																<option value="Antigua and Barbuda">Antigua and Barbuda</option>
																<option value="Argentina">Argentina</option>
																<option value="Armenia">Armenia</option>
																<option value="Aruba">Aruba</option>
																<option value="Australia">Australia</option>
																<option value="Austria">Austria</option>
																<option value="Azerbaijan">Azerbaijan</option>
																<option value="Bahamas">Bahamas</option>
																<option value="Bahrain">Bahrain</option>
																<option value="Bangladesh">Bangladesh</option>
																<option value="Barbados">Barbados</option>
																<option value="Belarus">Belarus</option>
																<option value="Belgium">Belgium</option>
																<option value="Belize">Belize</option>
																<option value="Benin">Benin</option>
																<option value="Bermuda">Bermuda</option>
																<option value="Bhutan">Bhutan</option>
																<option value="Bolivia">Bolivia</option>
																<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
																<option value="Botswana">Botswana</option>
																<option value="Bouvet Island">Bouvet Island</option>
																<option value="Brazil">Brazil</option>
																<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
																<option value="Brunei Darussalam">Brunei Darussalam</option>
																<option value="Bulgaria">Bulgaria</option>
																<option value="Burkina Faso">Burkina Faso</option>
																<option value="Burundi">Burundi</option>
																<option value="Cambodia">Cambodia</option>
																<option value="Cameroon">Cameroon</option>
																<option value="Canada">Canada</option>
																<option value="Cape Verde">Cape Verde</option>
																<option value="Cayman Islands">Cayman Islands</option>
																<option value="Central African Republic">Central African Republic</option>
																<option value="Chad">Chad</option>
																<option value="Chile">Chile</option>
																<option value="China">China</option>
																<option value="Christmas Island">Christmas Island</option>
																<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
																<option value="Colombia">Colombia</option>
																<option value="Comoros">Comoros</option>
																<option value="Congo">Congo</option>
																<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
																<option value="Cook Islands">Cook Islands</option>
																<option value="Costa Rica">Costa Rica</option>
																<option value="Cote D'ivoire">Cote D'ivoire</option>
																<option value="Croatia">Croatia</option>
																<option value="Cuba">Cuba</option>
																<option value="Cyprus">Cyprus</option>
																<option value="Czech Republic">Czech Republic</option>
																<option value="Denmark">Denmark</option>
																<option value="Djibouti">Djibouti</option>
																<option value="Dominica">Dominica</option>
																<option value="Dominican Republic">Dominican Republic</option>
																<option value="Ecuador">Ecuador</option>
																<option value="Egypt">Egypt</option>
																<option value="El Salvador">El Salvador</option>
																<option value="Equatorial Guinea">Equatorial Guinea</option>
																<option value="Eritrea">Eritrea</option>
																<option value="Estonia">Estonia</option>
																<option value="Ethiopia">Ethiopia</option>
																<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
																<option value="Faroe Islands">Faroe Islands</option>
																<option value="Fiji">Fiji</option>
																<option value="Finland">Finland</option>
																<option value="France">France</option>
																<option value="French Guiana">French Guiana</option>
																<option value="French Polynesia">French Polynesia</option>
																<option value="French Southern Territories">French Southern Territories</option>
																<option value="Gabon">Gabon</option>
																<option value="Gambia">Gambia</option>
																<option value="Georgia">Georgia</option>
																<option value="Germany">Germany</option>
																<option value="Ghana">Ghana</option>
																<option value="Gibraltar">Gibraltar</option>
																<option value="Greece">Greece</option>
																<option value="Greenland">Greenland</option>
																<option value="Grenada">Grenada</option>
																<option value="Guadeloupe">Guadeloupe</option>
																<option value="Guam">Guam</option>
																<option value="Guatemala">Guatemala</option>
																<option value="Guinea">Guinea</option>
																<option value="Guinea-bissau">Guinea-bissau</option>
																<option value="Guyana">Guyana</option>
																<option value="Haiti">Haiti</option>
																<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
																<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
																<option value="Honduras">Honduras</option>
																<option value="Hong Kong">Hong Kong</option>
																<option value="Hungary">Hungary</option>
																<option value="Iceland">Iceland</option>
																<option value="India">India</option>
																<option value="Indonesia">Indonesia</option>
																<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
																<option value="Iraq">Iraq</option>
																<option value="Ireland">Ireland</option>
																<option value="Israel">Israel</option>
																<option value="Italy">Italy</option>
																<option value="Jamaica">Jamaica</option>
																<option value="Japan">Japan</option>
																<option value="Jordan">Jordan</option>
																<option value="Kazakhstan">Kazakhstan</option>
																<option value="Kenya">Kenya</option>
																<option value="Kiribati">Kiribati</option>
																<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
																<option value="Korea, Republic of">Korea, Republic of</option>
																<option value="Kuwait">Kuwait</option>
																<option value="Kyrgyzstan">Kyrgyzstan</option>
																<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
																<option value="Latvia">Latvia</option>
																<option value="Lebanon">Lebanon</option>
																<option value="Lesotho">Lesotho</option>
																<option value="Liberia">Liberia</option>
																<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
																<option value="Liechtenstein">Liechtenstein</option>
																<option value="Lithuania">Lithuania</option>
																<option value="Luxembourg">Luxembourg</option>
																<option value="Macao">Macao</option>
																<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
																<option value="Madagascar">Madagascar</option>
																<option value="Malawi">Malawi</option>
																<option value="Malaysia">Malaysia</option>
																<option value="Maldives">Maldives</option>
																<option value="Mali">Mali</option>
																<option value="Malta">Malta</option>
																<option value="Marshall Islands">Marshall Islands</option>
																<option value="Martinique">Martinique</option>
																<option value="Mauritania">Mauritania</option>
																<option value="Mauritius">Mauritius</option>
																<option value="Mayotte">Mayotte</option>
																<option value="Mexico">Mexico</option>
																<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
																<option value="Moldova, Republic of">Moldova, Republic of</option>
																<option value="Monaco">Monaco</option>
																<option value="Mongolia">Mongolia</option>
																<option value="Montserrat">Montserrat</option>
																<option value="Morocco">Morocco</option>
																<option value="Mozambique">Mozambique</option>
																<option value="Myanmar">Myanmar</option>
																<option value="Namibia">Namibia</option>
																<option value="Nauru">Nauru</option>
																<option value="Nepal">Nepal</option>
																<option value="Netherlands">Netherlands</option>
																<option value="Netherlands Antilles">Netherlands Antilles</option>
																<option value="New Caledonia">New Caledonia</option>
																<option value="New Zealand">New Zealand</option>
																<option value="Nicaragua">Nicaragua</option>
																<option value="Niger">Niger</option>
																<option value="Nigeria">Nigeria</option>
																<option value="Niue">Niue</option>
																<option value="Norfolk Island">Norfolk Island</option>
																<option value="Northern Mariana Islands">Northern Mariana Islands</option>
																<option value="Norway">Norway</option>
																<option value="Oman">Oman</option>
																<option value="Pakistan">Pakistan</option>
																<option value="Palau">Palau</option>
																<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
																<option value="Panama">Panama</option>
																<option value="Papua New Guinea">Papua New Guinea</option>
																<option value="Paraguay">Paraguay</option>
																<option value="Peru">Peru</option>
																<option value="Philippines">Philippines</option>
																<option value="Pitcairn">Pitcairn</option>
																<option value="Poland">Poland</option>
																<option value="Portugal">Portugal</option>
																<option value="Puerto Rico">Puerto Rico</option>
																<option value="Qatar">Qatar</option>
																<option value="Reunion">Reunion</option>
																<option value="Romania">Romania</option>
																<option value="Russian Federation">Russian Federation</option>
																<option value="Rwanda">Rwanda</option>
																<option value="Saint Helena">Saint Helena</option>
																<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
																<option value="Saint Lucia">Saint Lucia</option>
																<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
																<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
																<option value="Samoa">Samoa</option>
																<option value="San Marino">San Marino</option>
																<option value="Sao Tome and Principe">Sao Tome and Principe</option>
																<option value="Saudi Arabia">Saudi Arabia</option>
																<option value="Senegal">Senegal</option>
																<option value="Serbia and Montenegro">Serbia and Montenegro</option>
																<option value="Seychelles">Seychelles</option>
																<option value="Sierra Leone">Sierra Leone</option>
																<option value="Singapore">Singapore</option>
																<option value="Slovakia">Slovakia</option>
																<option value="Slovenia">Slovenia</option>
																<option value="Solomon Islands">Solomon Islands</option>
																<option value="Somalia">Somalia</option>
																<option value="South Africa">South Africa</option>
																<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
																<option value="Spain">Spain</option>
																<option value="Sri Lanka">Sri Lanka</option>
																<option value="Sudan">Sudan</option>
																<option value="Suriname">Suriname</option>
																<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
																<option value="Swaziland">Swaziland</option>
																<option value="Sweden">Sweden</option>
																<option value="Switzerland">Switzerland</option>
																<option value="Syrian Arab Republic">Syrian Arab Republic</option>
																<option value="Taiwan, Province of China">Taiwan, Province of China</option>
																<option value="Tajikistan">Tajikistan</option>
																<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
																<option value="Thailand">Thailand</option>
																<option value="Timor-leste">Timor-leste</option>
																<option value="Togo">Togo</option>
																<option value="Tokelau">Tokelau</option>
																<option value="Tonga">Tonga</option>
																<option value="Trinidad and Tobago">Trinidad and Tobago</option>
																<option value="Tunisia">Tunisia</option>
																<option value="Turkey">Turkey</option>
																<option value="Turkmenistan">Turkmenistan</option>
																<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
																<option value="Tuvalu">Tuvalu</option>
																<option value="Uganda">Uganda</option>
																<option value="Ukraine">Ukraine</option>
																<option value="United Arab Emirates">United Arab Emirates</option>
																<option value="United Kingdom">United Kingdom</option>
																<option value="United States">United States</option>
																<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
																<option value="Uruguay">Uruguay</option>
																<option value="Uzbekistan">Uzbekistan</option>
																<option value="Vanuatu">Vanuatu</option>
																<option value="Venezuela">Venezuela</option>
																<option value="Viet Nam">Viet Nam</option>
																<option value="Virgin Islands, British">Virgin Islands, British</option>
																<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
																<option value="Wallis and Futuna">Wallis and Futuna</option>
																<option value="Western Sahara">Western Sahara</option>
																<option value="Yemen">Yemen</option>
																<option value="Zambia">Zambia</option>
																<option value="Zimbabwe">Zimbabwe</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-map-marker fa-lg fa-fw"></i></span>
															<select class="form-control input-lg" name="city">
																<option value="" selected="selected">Select City</option>
																<option>Amsterdam</option>
																<option>Atlanta</option>
																<option>Baltimore</option>
																<option>Boston</option>
																<option>Buenos Aires</option>
																<option>Calgary</option>
																<option>Chicago</option>
																<option>Denver</option>
																<option>Dubai</option>
																<option>Frankfurt</option>
																<option>Hong Kong</option>
																<option>Honolulu</option>
																<option>Houston</option>
																<option>Kuala Lumpur</option>
																<option>London</option>
																<option>Los Angeles</option>
																<option>Melbourne</option>
																<option>Mexico City</option>
																<option>Miami</option>
																<option>Minneapolis</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-envelope-o fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" placeholder="Postal Code" type="text" name="postal" id="postal">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-phone fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" data-mask="+99 (999) 999-9999" data-mask-placeholder= "X" placeholder="+1" type="text" name="wphone" id="wphone">
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-mobile fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" data-mask="+99 (999) 999-9999" data-mask-placeholder= "X" placeholder="+01" type="text" name="hphone" id="hphone">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab33">
											<br>
											<h3><strong>Step 3</strong> - Domain Setup</h3>
											<div class="alert alert-info fade in">
												<button class="close" data-dismiss="alert">
													×
												</button>
												<i class="fa-fw fa fa-info"></i>
												<strong>Info!</strong> Place an info message box if you wish.
											</div>
											<div class="form-group">
												<label>This is a label</label>
												<input class="form-control input-lg" placeholder="Another input box here..." type="text" name="etc" id="etc">
											</div>
										</div>
										<div class="tab-pane" id="tab34">
											<br>
											<h3><strong>Step 4</strong> - Save Form</h3>
											<br>
											<h1 class="text-center text-success"><strong><i class="fa fa-check fa-lg"></i> Complete</strong></h1>
											<h4 class="text-center">Click next to finish</h4>
											<br>
											<br>
										</div>

										<div class="form-actions">
											<div class="row">
												<div class="col-sm-12">
													<ul class="pager wizard no-margin">
														<li class="previous disabled">
															<a href="javascript:void(0);" class="btn btn-lg btn-default"> Previous </a>
														</li>
														<li class="next">
															<a href="javascript:void(0);" class="btn btn-lg txt-color-darken"> Next </a>
														</li>
													</ul>
												</div>
											</div>
										</div>

									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div> -->
		


	</div>
</div>

<!-- ****************************** -->
<!-- ****************************** -->
<div class="container_wizard" style="visibility:hidden">
		<form method="POST" id="wizard_form" class="form-horizontal">
		<h1 class="wizard_title">Réservation</h1>
		
		<!-- ****************************** -->
		<!-- Page 1 Date                    -->
		<fieldset class="sectionwrap" id="date_fieldset" style="width:680px;">
			<legend>Date</legend>
		
			<div class="control-group">
				<label class="control-label big" for="date_resa">Date</label>
			
				<div class="controls">
					<input type="text" id="date_resa" name="date_resa" readonly placeholder="Choisir une date" class="span5 serialize" style="height: 30px; width: 380px;"/>
				</div>
			
				<div class="controls">
					<div id="datepicker"></div>
				</div>
			</div>
		</fieldset>
		
		<!-- ****************************** -->
		<!-- Page 2 Heures                  -->
		<fieldset class="sectionwrap" id="parcours_fieldset" style="width:680px;">
			<legend>Parcours</legend>
		
			<div class="control-group">
				<label class="control-label big" for="heure_resa">Heure</label>
			
				<div class="controls">
					<select id="heure_resa" name="heure_resa" class="serialize" size="17" >
						<optgroup id="nb_trous_optgroup" label="18 Trous"></optgroup>
					</select>
					<div id="nb_trous_selector">
						18 Trous
						<input autocomplete='off' type="checkbox" name="nb_trous_sw" id="nb_trous_sw" value="1" class="switch" checked="checked" style="display: none;">
						9 Trous
					</div>
				</div>
			
				<input type="hidden" name="nb_trous" id="nb_trous" class="serialize" value="18" />
				
			</div>
		</fieldset>
		
		<!-- ****************************** -->
		<!-- Page 3 Joueurs                 -->
		<fieldset class="sectionwrap" id="players_fieldset" style="width:680px;">
			<legend>Joueurs</legend>
			<input type="hidden" id="places_dispo" value="4">
			<? if($isLogged){?>
				<!-- fieldset for members -->
				<? for($i = 1; $i <= 4; $i++) { ?>
					<div class="control-group" style="margin-bottom: 20px">
						<label class="control-label big" for='joueur<?=$i;?>'>Joueur #<?=$i;?></label>
						<div class="controls">
							<input type="text" placeholder="Chercher un nom..." id="joueur<?=$i;?>" name="joueur<?=$i;?>" class="span5 joueur_input" value="<?=$players[$i]['name'];?>" <?=$players[$i]['tags'];?> style="height: 30px"/>
							<?php for($k = 0; $k < count($ressources); $k++) {
								echo "<input type='checkbox' name='" .$ressources[$k]['ressource'] ."[]' class='" .$ressources[$k]['ressource'] ."_check cb_ressource_" .$i ." serialize' value='" .($i - 1) ."' /> " .$ressources[$k]['ressource'];
							} ?>
							<? if($isAdmin && $i ==1){?>
								<input type="hidden" name="id_joueur1" id="id_joueur1" class="serialize" value="2">
							<? }else{ ?>
								<input type="hidden" name="id_joueur<?=$i;?>" id="id_joueur<?=$i;?>" class="serialize" value="<?=$players[$i]['id'];?>">
							<? } ?>
							<input type="hidden" name="nbTrousJ<?=$i;?>" id="nbTrousJ<?=$i;?>" class="serialize" value="">
						</div>
					</div>
				<? } ?>
				<input type="hidden" name="nb_joueurs" id="nb_joueurs" class="serialize">
			<? }else{?>
				<!-- fieldset for public -->
				<div class="control-group">
					<label class="control-label big" for="nb_joueurs">Joueurs et ressources</label>
					<div class="controls" style="margin: 20px">
						<span class="control-label big" for="nb_joueurs" style="padding-right: 20px; margin-right: 30px;">Nombre de joueurs</span>
						<input type="radio" name="nb_joueurs" class="nb_joueurs serialize" id="nb_joueurs_1" value="1" checked /> 1
						<input type="radio" name="nb_joueurs" class="nb_joueurs serialize" id="nb_joueurs_2" value="2" /> 2
						<input type="radio" name="nb_joueurs" class="nb_joueurs serialize" id="nb_joueurs_3" value="3" /> 3
						<input type="radio" name="nb_joueurs" class="nb_joueurs serialize" id="nb_joueurs_4" value="4" /> 4
						<input type="hidden" name="id_joueur1" id="id_joueur1" class="serialize" value="1">
					</div>
				
					<? for($k = 0; $k < count($ressources); $k++) { ?>
						<!-- <div class="control-group"> -->
							<!-- <label class="control-label big" for="nb_<?= $ressources[$k]['ressource'];?>">Nombre de <?= $ressources[$k]['ressource'];?>s</label> -->
							<div class="controls" style="margin: 20px">
							<!-- <div class="controls"> -->
								<span class="control-label big" for="nb_<?= $ressources[$k]['ressource'];?>" style="padding-right: 20px">Nombre de <?= $ressources[$k]['ressource'];?>s</span>
								<? for($i = 0; $i <= $ressources[$k]['qte_max_par_partie']; $i++) { ?>
									<input type="radio" name="nb_<?=$ressources[$k]['ressource'];?>s" class="serialize nb_<?= $ressources[$k]['ressource'];?>s" name="nb_<?=  $ressources[$k]['ressource'];?>s"  value="<?=$i;?>" <?=($i == 0) ? "checked" : "";?>/> <?=$i;?>
								<? } ?>
							</div>
						<!-- </div> -->
					<? } ?>
				</div>
			<? }?>
		
			<div id="selection"></div>
		</fieldset>
		
		<!-- ****************************** -->
		<!-- Page 4 Si Visiteur: Coordonnées-->
		<? if(!$isLogged){?>
		<fieldset class="sectionwrap"  style="width:680px;">
			<legend>Coordonnées</legend>
				
			<input type="hidden" id="places_dispo" value="4">
				
			<div class="control-group">
				<label class="control-label big" for="client_name">Nom * </label>
				<div class="controls">
					<input type="text" id="client_name" name="client_name" class="span5 joueur_input serialize"/>
				</div>
			</div>
					
			<div class="control-group">
				<label class="control-label big" for="client_firstname">Prénom * </label>
				<div class="controls">
					<input type="text" id="client_firstname" name="client_firstname" class="span5 joueur_input serialize"/>
				</div>
			</div>
					
			<div class="control-group">
				<label class="control-label big" for="client_email">E-mail * </label>
				<div class="controls">
					<input type="text" id="client_email" name="client_email" class="span5 joueur_input serialize"/>
				</div>
			</div>
					
			<div class="control-group">
				<label class="control-label big" for="client_phone">Téléphone</label>
				<div class="controls">
					<input type="text" id="client_phone" name="client_phone" class="span5 joueur_input serializes"/>
				</div>
			</div>
			<div id="selection"></div>
		</fieldset>
		<? }?>
		
		<!-- ****************************** -->
		<!-- Page 5 Recap                   -->
		<fieldset class="sectionwrap" id="confirmation_fieldset" style="width:680px;">
			<legend>Récapitulatif</legend>
		
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
				<div id="reservation_done" class="controls" style="display:none;">Votre réservation à bien été faite.</div>
			</div>
		</fieldset>

		<!-- ****************************** -->
		<!-- Boutons                        -->
		<input type="hidden" name="isFormValid" id="isFormValid"  class="serialize" value="false">
		<input type="hidden" name="id_resa_provi_aller" id="id_resa_provi_aller"  class="serialize">
		<input type="hidden" name="id_resa_provi_retour" id="id_resa_provi_retour" class="serialize">
		<button type="submit" class="blue" id="submitResa" disabled>Réserver</button>
	</form>
</div>
<!-- ****************************** -->
<!-- ****************************** -->

<!-- ****************************** -->
<!-- Script part                    -->

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?=ASSETS_URL?>/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?=ASSETS_URL?>/js/plugin/fuelux/wizard/wizard.min.js"></script>

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

	var $validator = $("#wizard-1").validate({
		    
		rules: {
			email: {
				required: true,
				email: "Your email address must be in the format of name@domain.com"
			},
			fname: {
				required: true
			},
			lname: {
				required: true
			},
			country: {
				required: true
			},
			city: {
				required: true
			},
			postal: {
				required: true,
				minlength: 4
			},
			wphone: {
				required: true,
				minlength: 10
			},
			hphone: {
				required: true,
				minlength: 10
			}
		},
		    
		messages: {
			fname: "Please specify your First name",
			lname: "Please specify your Last name",
			email: {
				required: "We need your email address to contact you",
				email: "Your email address must be in the format of name@domain.com"
			}
		},
		    
		highlight: function (element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function (element) {
			$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function (error, element) {
			if (element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		}
	});
		  
	$('#bootstrap-wizard-1').bootstrapWizard({
		'tabClass': 'form-wizard',
		'onNext': function (tab, navigation, index) {
			var $valid = $("#wizard-1").valid();
			if (!$valid) {
				$validator.focusInvalid();
				return false;
			} else {
				$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
					'complete');
					$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
					.html('<i class="fa fa-check"></i>');
				}
			}
		});
		  
	
		// fuelux wizard
		var wizard = $('.wizard').wizard();
		  
		wizard.on('finished', function (e, data) {
			//$("#fuelux-wizard").submit();
			//console.log("submitted!");
			$.smallBox({
				title: "Congratulations! Your form was submitted",
				content: "<i class='fa fa-clock-o'></i> <i>1 seconds ago...</i>",
				color: "#5F895F",
				iconSmall: "fa fa-check bounce animated",
				timeout: 4000
			});
		    
		});

	
	})

</script>
