<style type="text/css">
	#datepicker {
		margin-top: 20px;
		margin-left:50px;
		margin-bottom:20px;
		width:200px;
		float:left;
	}
	
</style>

<!-- <link rel="stylesheet" type="text/css" href="/assets/fullcalendar/jquery-ui.css" /> -->
<link href="/assets/libs/jquery-ui/css/themes/redmond/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- <script src="/assets/fullcalendar/jquery-1.8.3.js" type="text/javascript"></script> -->
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/jquery/jquery-migrate.min.js"></script>
<script src="/assets/wizard/jquery.ui.datepicker-fr.js" type="text/javascript"></script>
<!-- <script src="/assets/fullcalendar/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script> -->
<script src="/assets/libs/jquery-ui/js/jquery-ui.min.js"></script>


<div id="datepicker" class="no_print">
	
</div>


<script type="text/javascript">

	$(document).ready(function(){
		$( "#datepicker" ).datepicker({
			dateFormat: "yy-mm-dd" ,
			defaultDate: $.datepicker.parseDate("yy-mm-dd","<?=$req_date?>"),
			onSelect: function(dateText, inst) {
				location.href = "/golf/departs/jour/" + dateText;
			}
		});
		
	});
	
</script>