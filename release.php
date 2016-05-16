<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer

?>
	<h1 id="h1_report">RELEASE REPORT</h1>
	<div id="form_report">
	<form class="form-horizontal" role="form" action="releasepdf.php" method="post">
	  <div class="form-group">
		    <label class="control-label col-sm-3" for="period">Period </label>
		    <div class="col-sm-4">
		        <div class="input-group date" data-provide="datepicker-inline" id="picker_case">
			      	<input type="text" class="form-control" name="period_start" id="period_start">
			      	<div class="input-group-addon">
			          	<span class="glyphicon glyphicon-th"></span>
			      	</div>
	     		</div> 
		    </div>
		    <div class="col-sm-4">
		        <div class="input-group date" data-provide="datepicker-inline" id="picker_case">
			      	<input type="text" class="form-control" name="period_end" id="period_end">
			      	<div class="input-group-addon">
			          	<span class="glyphicon glyphicon-th"></span>
			      	</div>
	     		</div> 
		    </div>
	  	</div>
	  <div class="form-group">
	    <label class="control-label col-sm-3" for="class">Classification </label>
	    <div class="col-sm-4" id="input_class">
	      <select class="form-control form-control-inline" id="class" name="class">
	      <option value="Micro">Micro</option>
	      <option value="SME">SME</option>
	      <option value="Micro and SME">Both</option>
	    </select>
	    </div>
	  </div>
	  <div class="form-group" id="report_buttons"> 
	    <div class="col-sm-offset-3 col-sm-8">
	      	<button type="submit" class="btn btn-default" id="add_button" name="add_button">Generate</button>
	    	<a href="release.php" class="btn btn-default" id="add_button">Cancel</a>
	    </div>
	  </div>
	</form>
	</div>
