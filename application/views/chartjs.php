<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once(APPPATH."views/inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Chart.js";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["graphs"]["sub"]["chartjs"]["active"] = true;
include("inc/nav.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<?php
				//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
				//$breadcrumbs["New Crumb"] => "http://url.com"
				$breadcrumbs["Graphs"] = "";
				include("inc/ribbon.php");
			?>
			<!-- MAIN CONTENT -->
			<div id="content">
				<!-- row -->
				<div class="row">
					
					<!-- col -->
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							
							<!-- PAGE HEADER -->
							<i class="fa fa-fw fa-bar-chart-o"></i> 
								Graphs 
							<span>>  
								Chart.js
							</span>
						</h1>
					</div>
					<!-- end col -->
					
					<!-- right side of the page with the sparkline graphs -->
					<!-- col -->
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
						<!-- sparks -->
						<ul id="sparks">
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
						</ul>
						<!-- end sparks -->
					</div>
					<!-- end col -->
					
				</div>
				<!-- end row -->

				<!--
					The ID "widget-grid" will start to initialize all widgets below 
					You do not need to use widgets if you dont want to. Simply remove 
					the <section></section> and you can use wells or panels instead 
					-->

				<!-- widget grid -->
				<section id="widget-grid" class="">

					<!-- row -->
					<div class="row">
						
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
								<!-- widget options:
									usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
									
									data-widget-colorbutton="false"	
									data-widget-editbutton="false"
									data-widget-togglebutton="false"
									data-widget-deletebutton="false"
									data-widget-fullscreenbutton="false"
									data-widget-custombutton="false"
									data-widget-collapsed="true" 
									data-widget-sortable="false"
									
								-->
								<header>
									
									<h2>Line Chart </h2>				
									
								</header>

								<!-- widget div-->
								<div>
									
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										<input class="form-control" type="text">	
									</div>
									<!-- end widget edit box -->
									
									<!-- widget content -->
									<div class="widget-body">
										
										<!-- this is what the user will see -->
										<canvas id="lineChart" height="120"></canvas>

									</div>
									<!-- end widget content -->
									
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
								<!-- widget options:
									usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
									
									data-widget-colorbutton="false"	
									data-widget-editbutton="false"
									data-widget-togglebutton="false"
									data-widget-deletebutton="false"
									data-widget-fullscreenbutton="false"
									data-widget-custombutton="false"
									data-widget-collapsed="true" 
									data-widget-sortable="false"
									
								-->
								<header>

									<h2>Radar Chart </h2>				
									
								</header>

								<!-- widget div-->
								<div>
									
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										<input class="form-control" type="text">	
									</div>
									<!-- end widget edit box -->
									
									<!-- widget content -->
									<div class="widget-body">
										
										<!-- this is what the user will see -->
										<canvas id="radarChart" height="120"></canvas>

									</div>
									<!-- end widget content -->
									
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-3" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
								<!-- widget options:
									usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
									
									data-widget-colorbutton="false"	
									data-widget-editbutton="false"
									data-widget-togglebutton="false"
									data-widget-deletebutton="false"
									data-widget-fullscreenbutton="false"
									data-widget-custombutton="false"
									data-widget-collapsed="true" 
									data-widget-sortable="false"
									
								-->
								<header>

									<h2>Polar Chart </h2>				
									
								</header>

								<!-- widget div-->
								<div>
									
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										<input class="form-control" type="text">	
									</div>
									<!-- end widget edit box -->
									
									<!-- widget content -->
									<div class="widget-body">
										
										<!-- this is what the user will see -->
										<canvas id="polarChart" height="120"></canvas>

									</div>
									<!-- end widget content -->
									
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->

						</article>
						<!-- WIDGET END -->

						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
								<!-- widget options:
									usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
									
									data-widget-colorbutton="false"	
									data-widget-editbutton="false"
									data-widget-togglebutton="false"
									data-widget-deletebutton="false"
									data-widget-fullscreenbutton="false"
									data-widget-custombutton="false"
									data-widget-collapsed="true" 
									data-widget-sortable="false"
									
								-->
								<header>

									<h2>Bar Chart </h2>				
									
								</header>

								<!-- widget div-->
								<div>
									
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										<input class="form-control" type="text">	
									</div>
									<!-- end widget edit box -->
									
									<!-- widget content -->
									<div class="widget-body">
										
										<!-- this is what the user will see -->
										<canvas id="barChart" height="120"></canvas>

									</div>
									<!-- end widget content -->
									
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-4" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
								<!-- widget options:
									usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
									
									data-widget-colorbutton="false"	
									data-widget-editbutton="false"
									data-widget-togglebutton="false"
									data-widget-deletebutton="false"
									data-widget-fullscreenbutton="false"
									data-widget-custombutton="false"
									data-widget-collapsed="true" 
									data-widget-sortable="false"
									
								-->
								<header>

									<h2>Doughnut Chart </h2>				
									
								</header>

								<!-- widget div-->
								<div>
									
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										<input class="form-control" type="text">	
									</div>
									<!-- end widget edit box -->
									
									<!-- widget content -->
									<div class="widget-body">
										
										<!-- this is what the user will see -->
										<canvas id="doughnutChart" height="120"></canvas>

									</div>
									<!-- end widget content -->
									
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-6" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
								<!-- widget options:
									usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
									
									data-widget-colorbutton="false"	
									data-widget-editbutton="false"
									data-widget-togglebutton="false"
									data-widget-deletebutton="false"
									data-widget-fullscreenbutton="false"
									data-widget-custombutton="false"
									data-widget-collapsed="true" 
									data-widget-sortable="false"
									
								-->
								<header>

									<h2>Pie Chart </h2>				
									
								</header>

								<!-- widget div-->
								<div>
									
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										<input class="form-control" type="text">	
									</div>
									<!-- end widget edit box -->
									
									<!-- widget content -->
									<div class="widget-body">
										
										<!-- this is what the user will see -->
										<canvas id="pieChart" height="120"></canvas>

									</div>
									<!-- end widget content -->
									
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->

						</article>
						<!-- WIDGET END -->
						
					</div>

					<!-- end row -->

					<!-- row -->

					<div class="row">

						<!-- a blank row to get started -->
						<div class="col-sm-12">
							<!-- your contents here -->
						</div>
							
					</div>

					<!-- end row -->

				</section>
				<!-- end widget grid -->


			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
	// include page footer
	include("inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

		<!-- PAGE RELATED PLUGIN(S) -->

		<!-- DYGRAPH -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/chartjs/chart.min.js"></script>
		
		<script type="text/javascript">
			
			$(document).ready(function() {

				/*
				 * PAGE RELATED SCRIPTS
				 */
				
				 // reference: http://www.chartjs.org/docs/

				// LINE CHART
				// ref: http://www.chartjs.org/docs/#line-chart-introduction
			    var lineOptions = {
				    ///Boolean - Whether grid lines are shown across the chart
				    scaleShowGridLines : true,
				    //String - Colour of the grid lines
				    scaleGridLineColor : "rgba(0,0,0,.05)",
				    //Number - Width of the grid lines
				    scaleGridLineWidth : 1,
				    //Boolean - Whether the line is curved between points
				    bezierCurve : true,
				    //Number - Tension of the bezier curve between points
				    bezierCurveTension : 0.4,
				    //Boolean - Whether to show a dot for each point
				    pointDot : true,
				    //Number - Radius of each point dot in pixels
				    pointDotRadius : 4,
				    //Number - Pixel width of point dot stroke
				    pointDotStrokeWidth : 1,
				    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
				    pointHitDetectionRadius : 20,
				    //Boolean - Whether to show a stroke for datasets
				    datasetStroke : true,
				    //Number - Pixel width of dataset stroke
				    datasetStrokeWidth : 2,
				    //Boolean - Whether to fill the dataset with a colour
				    datasetFill : true,
				    //Boolean - Re-draw chart on page resize
			        responsive: true,
				    //String - A legend template
				    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
			    };

			    var lineData = { labels: ["January", "February", "March", "April", "May", "June", "July"],
			        datasets: [
				        {
				            label: "My First dataset",
				            fillColor: "rgba(220,220,220,0.2)",
				            strokeColor: "rgba(220,220,220,1)",
				            pointColor: "rgba(220,220,220,1)",
				            pointStrokeColor: "#fff",
				            pointHighlightFill: "#fff",
				            pointHighlightStroke: "rgba(220,220,220,1)",
				            data: [65, 59, 80, 81, 56, 55, 40]
				        },
				        {
				            label: "My Second dataset",
				            fillColor: "rgba(151,187,205,0.2)",
				            strokeColor: "rgba(151,187,205,1)",
				            pointColor: "rgba(151,187,205,1)",
				            pointStrokeColor: "#fff",
				            pointHighlightFill: "#fff",
				            pointHighlightStroke: "rgba(151,187,205,1)",
				            data: [28, 48, 40, 19, 86, 27, 90]
				        }
				    ]
			    };

			    // render chart
			    var ctx = document.getElementById("lineChart").getContext("2d");
			    var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

			    // END LINE CHART

			    // BAR CHART

			    var barOptions = {
				    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
				    scaleBeginAtZero : true,
				    //Boolean - Whether grid lines are shown across the chart
				    scaleShowGridLines : true,
				    //String - Colour of the grid lines
				    scaleGridLineColor : "rgba(0,0,0,.05)",
				    //Number - Width of the grid lines
				    scaleGridLineWidth : 1,
				    //Boolean - If there is a stroke on each bar
				    barShowStroke : true,
				    //Number - Pixel width of the bar stroke
				    barStrokeWidth : 1,
				    //Number - Spacing between each of the X value sets
				    barValueSpacing : 5,
				    //Number - Spacing between data sets within X values
				    barDatasetSpacing : 1,
				    //Boolean - Re-draw chart on page resize
			        responsive: true,
				    //String - A legend template
				    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
			    }

			    var barData = {
			        labels: ["January", "February", "March", "April", "May", "June", "July"],
			         datasets: [
				        {
				            label: "My First dataset",
				            fillColor: "rgba(220,220,220,0.5)",
				            strokeColor: "rgba(220,220,220,0.8)",
				            highlightFill: "rgba(220,220,220,0.75)",
				            highlightStroke: "rgba(220,220,220,1)",
				            data: [65, 59, 80, 81, 56, 55, 40]
				        },
				        {
				            label: "My Second dataset",
				            fillColor: "rgba(151,187,205,0.5)",
				            strokeColor: "rgba(151,187,205,0.8)",
				            highlightFill: "rgba(151,187,205,0.75)",
				            highlightStroke: "rgba(151,187,205,1)",
				            data: [28, 48, 40, 19, 86, 27, 90]
				        }
				    ]
			    };

			    // render chart
			    var ctx = document.getElementById("barChart").getContext("2d");
			    var myNewChart = new Chart(ctx).Bar(barData, barOptions);

			    // END BAR CHART

			    // POLAR CHART

			    var polarOptions = {
				    //Boolean - Show a backdrop to the scale label
				    scaleShowLabelBackdrop : true,
				    //String - The colour of the label backdrop
				    scaleBackdropColor : "rgba(255,255,255,0.75)",
				    // Boolean - Whether the scale should begin at zero
				    scaleBeginAtZero : true,
				    //Number - The backdrop padding above & below the label in pixels
				    scaleBackdropPaddingY : 2,
				    //Number - The backdrop padding to the side of the label in pixels
				    scaleBackdropPaddingX : 2,
				    //Boolean - Show line for each value in the scale
				    scaleShowLine : true,
				    //Boolean - Stroke a line around each segment in the chart
				    segmentShowStroke : true,
				    //String - The colour of the stroke on each segement.
				    segmentStrokeColor : "#fff",
				    //Number - The width of the stroke value in pixels
				    segmentStrokeWidth : 2,
				    //Number - Amount of animation steps
				    animationSteps : 100,
				    //String - Animation easing effect.
				    animationEasing : "easeOutBounce",
				    //Boolean - Whether to animate the rotation of the chart
				    animateRotate : true,
				    //Boolean - Whether to animate scaling the chart from the centre
				    animateScale : false,
				    //Boolean - Re-draw chart on page resize
			        responsive: true,
				    //String - A legend template
				    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
			    };

			    var polarData = [
				    {
				        value: 300,
				        color:"rgba(220,220,220,0.8)",
				        highlight: "rgba(220,220,220,0.7)",
				        label: "Grey"
				    },
				    {
				        value: 50,
				        color: "rgba(151,187,205,1)",
				        highlight: "rgba(151,187,205,0.8)",
				        label: "Blue"
				    },
				    {
				        value: 100,
				        color: "rgba(169, 3, 41, 0.7)",
				        highlight: "rgba(169, 3, 41, 0.7)",
				        label: "Red"
				    },
				    {
				        value: 40,
				        color: "#949FB1",
				        highlight: "#A8B3C5",
				        label: "Grey"
				    },
				    {
				        value: 120,
				        color: "#4D5360",
				        highlight: "#616774",
				        label: "Dark Grey"
				    }
			    ];

			    // render chart
			    var ctx = document.getElementById("polarChart").getContext("2d");
			    var myNewChart = new Chart(ctx).PolarArea(polarData, polarOptions);

			    // END POLAR CHART

			    // DOUGNUT CHART

			    var doughnutOptions = {
				    //Boolean - Whether we should show a stroke on each segment
				    segmentShowStroke : true,
				    //String - The colour of each segment stroke
				    segmentStrokeColor : "#fff",
				    //Number - The width of each segment stroke
				    segmentStrokeWidth : 2,
				    //Number - The percentage of the chart that we cut out of the middle
				    percentageInnerCutout : 50, // This is 0 for Pie charts
				    //Number - Amount of animation steps
				    animationSteps : 100,
				    //String - Animation easing effect
				    animationEasing : "easeOutBounce",
				    //Boolean - Whether we animate the rotation of the Doughnut
				    animateRotate : true,
				    //Boolean - Whether we animate scaling the Doughnut from the centre
				    animateScale : false,
				    //Boolean - Re-draw chart on page resize
			        responsive: true,
				    //String - A legend template
				    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
			    };

			    var doughnutData = [
				   {
				        value: 300,
				        color:"rgba(220,220,220,0.8)",
				        highlight: "rgba(220,220,220,0.7)",
				        label: "Grey"
				    },
				    {
				        value: 50,
				        color: "rgba(151,187,205,1)",
				        highlight: "rgba(151,187,205,0.8)",
				        label: "Blue"
				    },
				    {
				        value: 100,
				        color: "rgba(169, 3, 41, 0.7)",
				        highlight: "rgba(169, 3, 41, 0.7)",
				        label: "Red"
				    }
			    ];

			    // render chart
			    var ctx = document.getElementById("doughnutChart").getContext("2d");
			    var myNewChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

			    // END DOUGHNUT CHART

			    // RADAR CHART

			    var radarData = {
			        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
			        datasets: [
				 		{
				            label: "My First dataset",
				            fillColor: "rgba(220,220,220,0.2)",
				            strokeColor: "rgba(220,220,220,1)",
				            pointColor: "rgba(220,220,220,1)",
				            pointStrokeColor: "#fff",
				            pointHighlightFill: "#fff",
				            pointHighlightStroke: "rgba(220,220,220,1)",
				            data: [65, 59, 90, 81, 56, 55, 40]
				        },
				        {
				            label: "My Second dataset",
				            fillColor: "rgba(151,187,205,0.2)",
				            strokeColor: "rgba(151,187,205,1)",
				            pointColor: "rgba(151,187,205,1)",
				            pointStrokeColor: "#fff",
				            pointHighlightFill: "#fff",
				            pointHighlightStroke: "rgba(151,187,205,1)",
				            data: [28, 48, 40, 19, 96, 27, 100]
				        }
			        ]
			    };

			    var radarOptions = {
				    //Boolean - Whether to show lines for each scale point
				    scaleShowLine : true,
				    //Boolean - Whether we show the angle lines out of the radar
				    angleShowLineOut : true,
				    //Boolean - Whether to show labels on the scale
				    scaleShowLabels : false,
				    // Boolean - Whether the scale should begin at zero
				    scaleBeginAtZero : true,
				    //String - Colour of the angle line
				    angleLineColor : "rgba(0,0,0,.1)",
				    //Number - Pixel width of the angle line
				    angleLineWidth : 1,
				    //String - Point label font declaration
				    pointLabelFontFamily : "'Arial'",
				    //String - Point label font weight
				    pointLabelFontStyle : "normal",
				    //Number - Point label font size in pixels
				    pointLabelFontSize : 10,
				    //String - Point label font colour
				    pointLabelFontColor : "#666",
				    //Boolean - Whether to show a dot for each point
				    pointDot : true,
				    //Number - Radius of each point dot in pixels
				    pointDotRadius : 3,
				    //Number - Pixel width of point dot stroke
				    pointDotStrokeWidth : 1,
				    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
				    pointHitDetectionRadius : 20,
				    //Boolean - Whether to show a stroke for datasets
				    datasetStroke : true,
				    //Number - Pixel width of dataset stroke
				    datasetStrokeWidth : 2,
				    //Boolean - Whether to fill the dataset with a colour
				    datasetFill : true,
				    //Boolean - Re-draw chart on page resize
			        responsive: true,
				    //String - A legend template
				    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
			    }

				// render chart
			    var ctx = document.getElementById("radarChart").getContext("2d");
			    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);
				
				// END RADAR CHART

			    // PIE CHART

			    var pieOptions = {
			    	//Boolean - Whether we should show a stroke on each segment
			        segmentShowStroke: true,
			        //String - The colour of each segment stroke
			        segmentStrokeColor: "#fff",
			        //Number - The width of each segment stroke
			        segmentStrokeWidth: 2,
			        //Number - Amount of animation steps
			        animationSteps: 100,
			        //String - types of animation
			        animationEasing: "easeOutBounce",
			        //Boolean - Whether we animate the rotation of the Doughnut
			        animateRotate: true,
			        //Boolean - Whether we animate scaling the Doughnut from the centre
			        animateScale: false,
			        //Boolean - Re-draw chart on page resize
			        responsive: true,
			        //String - A legend template
					legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
			    };

			    var pieData = [
				   {
				        value: 300,
				        color:"rgba(220,220,220,0.9)",
				        highlight: "rgba(220,220,220,0.8)",
				        label: "Grey"
				    },
				    {
				        value: 50,
				        color: "rgba(151,187,205,1)",
				        highlight: "rgba(151,187,205,0.8)",
				        label: "Blue"
				    },
				    {
				        value: 100,
				        color: "rgba(169, 3, 41, 0.7)",
				        highlight: "rgba(169, 3, 41, 0.7)",
				        label: "Red"
				    }
			    ];

			    // render chart
			    var ctx = document.getElementById("pieChart").getContext("2d");
			    var myNewChart = new Chart(ctx).Pie(pieData, pieOptions);

			    // END PIE CHART		
			
			})
		</script>
<?php 
	//include footer
	include("inc/google-analytics.php"); 
?>