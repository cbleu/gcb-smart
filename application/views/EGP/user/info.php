<!-- ****************************** -->
<!-- WIZARD: DHTML PART             -->
<!-- ****************************** -->

<!-- ****************************** -->
<!-- DOM fragment for Wizard template -->

<div id="content" style="opacity:1;">

	<!-- new row -->
	<div class="row">
	
		<!-- col -->
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-file-o"></i> Other Pages <span>>
				Profile </span></h1>
		</div>
		<!-- end col -->
	
		<!-- right side of the page with the sparkline graphs -->
		<!-- col -->
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
			<!-- sparks -->
			<!-- <ul id="sparks">
				<li class="sparks-info">
					<h5> My Income <span class="txt-color-blue">$47,171</span></h5>
					<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
						1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
					</div>
				</li>
				<li class="sparks-info">
					<h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
					<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
						110,150,300,130,400,240,220,310,220,300, 270, 210
					</div>
				</li>
				<li class="sparks-info">
					<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
					<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
						110,150,300,130,400,240,220,310,220,300, 270, 210
					</div>
				</li>
			</ul> -->
			<!-- end sparks -->
		</div>
		<!-- end col -->

	</div>
	<!-- end row -->
	
	<!-- new row -->
	<div class="row">

		<!-- new col -->
		<div class="col-sm-12">

			<!-- new well -->
			<div class="well well-sm">

				<!-- new row -->
				<div class="row">

					<!-- new Form infos -->
					<form class="form-horizontal" name="user_info_update" id="user_info_update">

					<!-- new col -->
					<div class="col-sm-12 col-md-12 col-lg-6">

						<!-- new well -->
						<div class="well well-light well-sm no-margin no-padding">

							<!-- new row -->
							<div class="row">

								<!-- new col -->
								<div class="col-sm-12">
									<div id="myCarousel" class="carousel fade profile-carousel">
										<!-- <div class="air air-bottom-right padding-10">
											<a href="javascript:void(0);" class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-check"></i> Follow</a>&nbsp; <a href="javascript:void(0);" class="btn txt-color-white bg-color-pinkDark btn-sm"><i class="fa fa-link"></i> Connect</a>
										</div> -->
										<div class="air air-top-left padding-10">
											<h4 class="txt-color-white font-md">Jan 1, 2014</h4>
										</div>
										<ol class="carousel-indicators">
											<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
											<li data-target="#myCarousel" data-slide-to="1" class=""></li>
											<li data-target="#myCarousel" data-slide-to="2" class=""></li>
										</ol>
										<div class="carousel-inner">
											<!-- Slide 1 -->
											<div class="item active">
												<img src="<?php echo ASSETS_URL; ?>/img/demo/s1.jpg" alt="">
											</div>
											<!-- Slide 2 -->
											<div class="item">
												<img src="<?php echo ASSETS_URL; ?>/img/demo/s2.jpg" alt="">
											</div>
											<!-- Slide 3 -->
											<div class="item">
												<img src="<?php echo ASSETS_URL; ?>/img/demo/m3.jpg" alt="">
											</div>
										</div>
									</div>
								</div>
								<!-- end col -->

								<!-- new col -->
								<div class="col-sm-12">

									<!-- new row -->
									<div class="row">

										<!-- new col -->
										<div class="col-sm-3 profile-pic">
											<img src="<?php echo ASSETS_URL; ?>/img/avatars/sunny-big.png">
											<!-- <div class="padding-10">
												<h4 class="font-md"><strong>1,543</strong>
												<br>
												<small>Followers</small></h4>
												<br>
												<h4 class="font-md"><strong>419</strong>
												<br>
												<small>Connections</small></h4>
											</div> -->
										</div>
										<!-- end col -->

										<!-- new col -->
										<div class="col-sm-6">
											<!-- Infos principales-->
											
											<div class="control-group">
												<!-- <h6><strong><label class="control-label" for="lastname">Nom</label></strong></h6> -->
												<h1><span class="semi-bold">
													<div class="controls">
														<input type="text" id="lastname" name="lastname" placeholder="Nom" class="required"  value="<?=$user->lastname?>"/>
													</div>
												</span></h1>
											</div>
											<div class="control-group">
												<!-- <label class="control-label" for="firstname">Prénom</label> -->
												<h1><span class="semi-bold">
													<div class="controls">
														<input type="text" id="firstname" name="firstname" placeholder="Prénom" class="required"  value="<?=$user->firstname?>"/>
													</div>
												</span></h1>
											</div>
											
											<?php if($isAdmin){?> <small> <strong>Role:</strong> Administrateur</small><br><?}?>
											
											<br>
											<p class="font-md">
												<i>Adresse</i>
											</p>

											<!-- new col -->
											<div class="col-sm-12">
												<div class="control-group">
													<label class="control-label" for="adresse">Adresse</label>
													<div class="controls">
														<input type="text" id="adresse" name="adresse" placeholder="Adresse"  value="<?=$user->adresse?>" class="input-12"/>
													</div>
												</div>
											</div>
											<!-- end col -->

											<!-- new col -->
											<div class="col-sm-6">
												<div class="control-group">
													<label class="control-label" for="cp">Code Postal</label>
													<div class="controls">
														<input type="text" id="cp" name="cp" placeholder="Code Postal"  value="<?=$user->cp?>"/>
													</div>
												</div>
											</div>
											<!-- end col -->
											<!-- new col -->
											<div class="col-sm-6">
												<div class="control-group">
													<label class="control-label" for="ville">Ville</label>
													<div class="input-group">
														<input type="text" id="ville" name="ville" placeholder="Ville"  value="<?=$user->ville?>"/>
													</div>
												</div>
											</div>
											<!-- end col -->

											<!-- new col -->
											<div class="col-sm-12">
												<div class="control-group">
													<label class="control-label" for="pays">Pays</label>
													<div class="controls">
														<select name="pays" id="pays">
															<?php
																foreach($pays as $p) {
																	$sel_pays = '<option value="'.$p->id.'" ';
																	if($p->id == $user->id_pays) {
																		$sel_pays .= " selected ";
																	}
																	$sel_pays .= '>'.$p->nom.'</option>';
																	echo $sel_pays;
																}
															?>
														</select>
													</div>
												</div>
											</div>
											<!-- end col -->

											<!-- new col -->
											<div class="col-sm-12">
												<div class="form-group">
													<label class="control-label" for="telephone">Téléphone</label>
													<div class="input-group">
														<input type="text" id="telephone" name="telephone" placeholder="Telephone" value="<?=$user->telephone?>" class="form-control"/>
													</div>
												</div>
											</div>
											<!-- end col -->

											<hr>

											<br>
											<!-- <a href="javascript:void(0);" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Send Message</a> -->
											<br>
											<br>
											<!-- new col -->
											<div class="col-sm-12">
												<div class="control-group">
													<div class="controls">
														<!-- <a class="btn btn-success" href="javascript:void(0);"><i class="fa fa-check"></i> Mettre à jour</a> -->
														<button id="submit_infos" class="btn btn-success submit"><i class="fa fa-check"></i> Mettre à jour</button>
													</div>
												</div>
											</div>
											<!-- end col -->

										</div>
										<!-- end col -->

										<!-- new col -->
										<div class="col-sm-3">
											<!-- <h1><small>Connections</small></h1>
											<ul class="list-inline friends-list">
												<li><img src="<?php echo ASSETS_URL; ?>/img/avatars/1.png" alt="friend-1">
												</li>
												<li><img src="<?php echo ASSETS_URL; ?>/img/avatars/2.png" alt="friend-2">
												</li>
												<li><img src="<?php echo ASSETS_URL; ?>/img/avatars/3.png" alt="friend-3">
												</li>
												<li><img src="<?php echo ASSETS_URL; ?>/img/avatars/4.png" alt="friend-4">
												</li>
												<li><img src="<?php echo ASSETS_URL; ?>/img/avatars/5.png" alt="friend-5">
												</li>
												<li><img src="<?php echo ASSETS_URL; ?>/img/avatars/male.png" alt="friend-6">
												</li>
												<li>
													<a href="javascript:void(0);">413 more</a>
												</li>
											</ul>

											<h1><small>Recent visitors</small></h1>
											<ul class="list-inline friends-list">
												<li><img src="<?php echo ASSETS_URL; ?>/img/avatars/male.png" alt="friend-1">
												</li>
												<li><img src="<?php echo ASSETS_URL; ?>/img/avatars/female.png" alt="friend-2">
												</li>
												<li><img src="<?php echo ASSETS_URL; ?>/img/avatars/female.png" alt="friend-3">
												</li>
											</ul> -->
										</div>
										<!-- end col -->

									</div>
									<!-- end row -->

								</div>
								<!-- end col -->
							</div>
							<!-- end row -->

							<!-- new row -->
							<div class="row">

								<!-- new col -->
								<div class="col-sm-12">

									<hr>

									<div class="padding-10">

										<ul class="nav nav-tabs tabs-pull-right">
											<li class="active">
												<a href="#a1" data-toggle="tab">Recent Articles</a>
											</li>
											<li>
												<a href="#a2" data-toggle="tab">New Members</a>
											</li>
											<li class="pull-left">
												<span class="margin-top-10 display-inline"><i class="fa fa-rss text-success"></i> Activity</span>
											</li>
										</ul>

										<div class="tab-content padding-top-10">
											<!-- new tab -->
											<div class="tab-pane fade in" id="a1">

												<div class="row">

													<div class="col-xs-2 col-sm-1">
														<time datetime="2014-09-20" class="icon">
															<strong>Jan</strong>
															<span>10</span>
														</time>
													</div>

													<div class="col-xs-10 col-sm-11">
														<h6 class="no-margin"><a href="javascript:void(0);">Allice in Wonderland</a></h6>
														<p>
															Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi Nam eget dui.
															Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero,
															sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel.
														</p>
													</div>

													<div class="col-sm-12">

														<hr>

													</div>

													<div class="col-xs-2 col-sm-1">
														<time datetime="2014-09-20" class="icon">
															<strong>Jan</strong>
															<span>10</span>
														</time>
													</div>

													<div class="col-xs-10 col-sm-11">
														<h6 class="no-margin"><a href="javascript:void(0);">World Report</a></h6>
														<p>
															Morning our be dry. Life also third land after first beginning to evening cattle created let subdue you'll winged don't Face firmament.
															You winged you're was Fruit divided signs lights i living cattle yielding over light life life sea, so deep.
															Abundantly given years bring were after. Greater you're meat beast creeping behold he unto She'd doesn't. Replenish brought kind gathering Meat.
														</p>
													</div>

													<div class="col-sm-12">

														<br>

													</div>

												</div>

											</div>
											<!-- new tab -->

											<!-- new tab -->
											<div class="tab-pane fade active" id="a2">

											</div>
											<!-- end tab -->
										</div>

									</div>

								</div>
								<!-- end col -->

							</div>
							<!-- end row -->

						</div>
						<!-- end well -->

					</div>
					<!-- end col -->

					</form>
					<!-- enf Form infos-->

					<!-- new Form pass -->
					<form class="form-horizontal" name="user_pass" id="user_pass">

					<!-- new col -->
					<div class="col-sm-12 col-md-12 col-lg-6">
						<!-- bloc d'infos supplémentaires-->

						<div class="well">
							<div class="jumbotron">
								<h1>Mot de passe</h1>
								<p>
								<div class="well well-lg">
									<!-- <div class="control-group">
										<div class="controls">
											<input type="text" name="email" id="inputEmail" placeholder="Email" class="required email" value="<?=$user->email?>"/>
										</div>
									</div> -->
									
									<!-- <div class="well well-lg">
										Email de connexion: <span class="font-xl"><?=$user->email?></span>
									</div> -->
										<div class="form-group">
											<label class="col-md-3 control-label">Email de connexion </label>
											<div class="col-md-9">
												<!-- <input class="form-control" placeholder="Default Text Field" type="text"> -->
												<input class="form-control" disabled="disabled" type="text" name="email" id="email" placeholder="email" value="<?=$user->email?>"/>
											</div>
										</div>
									
										<div class="form-group">
											<label class="col-md-3 control-label">Mot de passe </label>
											<div class="col-md-9">
												<!-- <input class="form-control" placeholder="Default Text Field" type="text"> -->
												<input class="form-control" type="password" name="password" id="inputPassword" placeholder="Mot de passe" minlength="4"/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Vérification</label>
											<div class="col-md-9">
												<!-- <input class="form-control" placeholder="Default Text Field" type="text"> -->
												<input class="form-control" type="password" name="password2" id="inputPassword2" placeholder="Mot de passe" minlength="4"/>
											</div>
										</div>
									<!-- <div class="control-group">
										<label class="control-label" for="inputPassword">Mot de passe *</label>
										<div class="controls">
											<input type="password" name="password" id="inputPassword" placeholder="Mot de passe" class="required" minlength="4"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword2">Mot de passe *</label>
										<div class="controls">
											<input type="password" name="password2" id="inputPassword2" placeholder="Mot de passe" class="required" minlength="4"/>
										</div>
									</div> -->

									<div class="control-group">
										<div class="controls">
											<!-- <a class="btn btn-success" href="javascript:void(0);"><i class="fa fa-check"></i> Mettre à jour</a> -->
											<button id="submit_pass" class="btn btn-danger btn-lg submit"><i class="fa fa-exclamation-circle-x3"></i> Changement de mot de passe</button>
										</div>
									</div>
								</div>
								</p>
						
								<!-- <p>
									<a class="btn btn-primary btn-lg" role="button">Changement de mot de passe</a>
								</p> -->
							</div>
						</div>

					</div>
					<!-- end col -->

					</form>
					<!-- enf Form pass-->

				</div>
				<!-- end row -->

			</div>
			<!-- end well -->

		</div>
		<!-- end col -->

	</div>
	<!-- end row -->


	<div class="row" style="display:none">

		<!-- NEW WIDGET START -->
		<div class="col-sm-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-user"></i> </span>
					<h2>Mes Informations</h2>
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
								<!-- Debut du Formulaire -->

								<form class="form-horizontal" name="user_info_update-old" id="user_info_update-old"  method="post" action="/public/application/updateuser">
									<fieldset>
									<div class="control-group">
										<label class="control-label" for="inputEmail">Email *</label>
										<div class="controls">
											<input type="text" name="email" id="inputEmail" placeholder="Email" class="required email" value="<?=$user->email?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword">Mot de passe *</label>
										<div class="controls">
											<input type="password" name="password" id="inputPassword" placeholder="Mot de passe" class="required" minlength="4"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword2">Mot de passe *</label>
										<div class="controls">
											<input type="password" name="password2" id="inputPassword2" placeholder="Mot de passe" class="required" minlength="4"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="lastname">Nom</label>
										<div class="controls">
											<input type="text" id="lastname" name="lastname" placeholder="Nom" class="required"  value="<?=$user->lastname?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="firstname">Prénom</label>
										<div class="controls">
											<input type="text" id="firstname" name="firstname" placeholder="Prénom" class="required"  value="<?=$user->firstname?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="adresse">Adresse</label>
										<div class="controls">
											<input type="text" id="adresse" name="adresse" placeholder="Adresse"  value="<?=$user->adresse?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="cp">Code Postal</label>
										<div class="controls">
											<input type="text" id="cp" name="cp" placeholder="Code Postal"  value="<?=$user->cp?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="ville">Ville</label>
										<div class="controls">
											<input type="text" id="ville" name="ville" placeholder="Ville"  value="<?=$user->ville?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="pays">Pays</label>
										<div class="controls">
											<select name="pays" id="pays">
												<?php
													foreach($pays as $p) {
														$sel_pays = '<option value="'.$p->id.'" ';
														if($p->id == $user->id_pays) {
															$sel_pays .= " selected ";
														}
														$sel_pays .= '>'.$p->nom.'</option>';
														echo $sel_pays;
													}
												?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="telephone">Téléphone</label>
										<div class="controls">
											<input type="text" id="telephone" name="telephone" placeholder="Telephone" value="<?=$user->telephone?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="index">Index</label>
										<div class="controls">
											<input type="text" id="index" name="index" placeholder="Index" value="<?=$user->indgolf?>"/>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<button type="submit" class="btn">Mettre à jour</button>
										</div>
									</div>
									</fieldset>
								</form>

								<!-- Fin du Formulaire -->
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

<script>

	$(document).ready(function() {
		// PAGE RELATED SCRIPTS
		$("#cp").mask("99999",{placeholder:"X"});
		$("#telephone").mask("9999-99-99-99",{placeholder:"X"});
	})

	$('button#submit_infos').click(function() {
	// $('#user_info_update .sumbit').click(function() {

		$.ajax({
			// async: true,
			type: "POST",
			url: "/resajax/updateuser",
			dataType: "json",
			data: $("#user_info_update").serialize(),
			success: function(data) {
				console.log(data);
				if(!data.valid) {
					alert(data.message);
					return false;
				}
			},
		});
	});

	$('button#submit_pass').click(function() {

		$.ajax({
			async: true,
			type: "POST",
			url: "/resajax/updatepass",
			dataType: "json",
			data: $("#user_pass").serialize(),
			success: function(data) {
				console.log(data);
				if(!data.valid) {
					alert(data.message);
					return false;
				}
			},
		});
	});

</script>



