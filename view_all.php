
<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer

// ADD TOOLTIPS!!!!!!!!!!!!!! :---)

?> 
	<div id="with_searchbar">
		<h1 id="h1_view">VIEW ALL</h1>
		<form class="pull-right" role="search">
			<div class="input-group" id="for_Search">
				<input type="text" class="form-control" placeholder="Search">
				<div class="input-group-btn">
					<a href="search.php" class="btn btn-default" role="button"><i class="glyphicon glyphicon-search" id="search_glyph"></i></a>
				</div>
			</div>
		</form>
	</div>
	<div class="table-responsive" id="view_all_table">
		<table class="table table-striped">
		  <thead id="colored_head">
		    <tr>
		      <th id="client_head">CLIENT</th>
		      <th id="icons_head"> </th>
		      <th id="release_head">RELEASE</th>
		      <th id="maturity_head">MATURITY</th>
		      <th id="loan_head">LOAN AMOUNT</th>
		      <th id="amount_head">AMOUNT BALANCE</th>
		      <th id="status_head">STATUS</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td class="container">Bernardo, Cathy</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a><a href="addcase.php"><i class="glyphicon glyphicon-level-up" id="icons"></i></a></td>
		      <td class="container" id="center_column">Jul-25-2014</td>
		      <td class="container" id="center_column">Sep-07-2014</td>
		      <td class="container" id="money">80,000.00</td>
		      <td class="container" id="money">0.00</td>
		      <td class="container" id="center_column">ACTIVE</td>
		    </tr>
		    <tr>
		      <td class="container">Coco, Lady</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a></td>
		      <td class="container" id="center_column">Oct-04-2012</td>
		      <td class="container" id="center_column">Nov-17-2012</td>
		      <td class="container" id="money">45,000.00</td>
		      <td class="container" id="money">34,000.00</td>
		      <td class="container" id="center_column">RISK</td>
		    </tr>
		    <tr>
		      <td class="container">dela Cruz, Juan</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a></td>
		      <td class="container" id="center_column">Jan-15-2013</td>
		      <td class="container" id="center_column">Feb-28-2013</td>
		      <td class="container" id="money">20,000.00</td>
		      <td class="container" id="money">20,000.00</td>
		      <td class="container" id="center_column">RUNAWAY</td>
		    </tr>
		    <tr>
		      <td class="container">Bernardo, Cathy</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a><a href="addcase.php"><i class="glyphicon glyphicon-level-up" id="icons"></i></a></td>
		      <td class="container" id="center_column">Jul-25-2014</td>
		      <td class="container" id="center_column">Sep-07-2014</td>
		      <td class="container" id="money">80,000.00</td>
		      <td class="container" id="money">0.00</td>
		      <td class="container" id="center_column">ACTIVE</td>
		    </tr>
		    <tr>
		      <td class="container">Coco, Lady</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a></td>
		      <td class="container" id="center_column">Oct-04-2012</td>
		      <td class="container" id="center_column">Nov-17-2012</td>
		      <td class="container" id="money">45,000.00</td>
		      <td class="container" id="money">34,000.00</td>
		      <td class="container" id="center_column">RISK</td>
		    </tr>
		    <tr>
		      <td class="container">dela Cruz, Juan</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a></td>
		      <td class="container" id="center_column">Jan-15-2013</td>
		      <td class="container" id="center_column">Feb-28-2013</td>
		      <td class="container" id="money">20,000.00</td>
		      <td class="container" id="money">20,000.00</td>
		      <td class="container" id="center_column">RUNAWAY</td>
		    </tr>
		    <tr>
		      <td class="container">Bernardo, Cathy</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a><a href="addcase.php"><i class="glyphicon glyphicon-level-up" id="icons"></i></a></td>
		      <td class="container" id="center_column">Jul-25-2014</td>
		      <td class="container" id="center_column">Sep-07-2014</td>
		      <td class="container" id="money">80,000.00</td>
		      <td class="container" id="money">0.00</td>
		      <td class="container" id="center_column">ACTIVE</td>
		    </tr>
		    <tr>
		      <td class="container">Coco, Lady</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a></td>
		      <td class="container" id="center_column">Oct-04-2012</td>
		      <td class="container" id="center_column">Nov-17-2012</td>
		      <td class="container" id="money">45,000.00</td>
		      <td class="container" id="money">34,000.00</td>
		      <td class="container" id="center_column">RISK</td>
		    </tr>
		    <tr>
		      <td class="container">dela Cruz, Juan</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a></td>
		      <td class="container" id="center_column">Jan-15-2013</td>
		      <td class="container" id="center_column">Feb-28-2013</td>
		      <td class="container" id="money">20,000.00</td>
		      <td class="container" id="money">20,000.00</td>
		      <td class="container" id="center_column">RUNAWAY</td>
		    </tr>
		    <tr>
		      <td class="container">Bernardo, Cathy</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a><a href="addcase.php"><i class="glyphicon glyphicon-level-up" id="icons"></i></a></td>
		      <td class="container" id="center_column">Jul-25-2014</td>
		      <td class="container" id="center_column">Sep-07-2014</td>
		      <td class="container" id="money">80,000.00</td>
		      <td class="container" id="money">0.00</td>
		      <td class="container" id="center_column">ACTIVE</td>
		    </tr>
		    <tr>
		      <td class="container">Coco, Lady</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a></td>
		      <td class="container" id="center_column">Oct-04-2012</td>
		      <td class="container" id="center_column">Nov-17-2012</td>
		      <td class="container" id="money">45,000.00</td>
		      <td class="container" id="money">34,000.00</td>
		      <td class="container" id="center_column">RISK</td>
		    </tr>
		    <tr>
		      <td class="container">dela Cruz, Juan</td>
		      <td class="container" id="logo_column"><a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a></td>
		      <td class="container" id="center_column">Jan-15-2013</td>
		      <td class="container" id="center_column">Feb-28-2013</td>
		      <td class="container" id="money">20,000.00</td>
		      <td class="container" id="money">20,000.00</td>
		      <td class="container" id="center_column">RUNAWAY</td>
		    </tr>
		  </tbody>
		</table>
	</div>

	<nav>
	  <ul class="pagination">
	    <li class="page-item active">
	      <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
	    </li>
	    <li class="page-item"><a class="page-link" href="#">2</a></li>
	    <li class="page-item"><a class="page-link" href="#">3</a></li>
	    <li class="page-item"><a class="page-link" href="#">4</a></li>
	    <li class="page-item"><a class="page-link" href="#">5</a></li>
	  </ul>
	</nav>
