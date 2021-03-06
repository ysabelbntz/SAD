<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer
include_once('database.php');
if(isset($_POST['add_button'])){
$name=$_POST['searcher'];
}
?>
	<div id="with_searchbar">
		<?php 

		echo('<h1 id="h1_view">SEARCH RESULTS FOR "'.$name.'"</h1>');
		
		?>
		<form class="pull-right searchsearch" role="search" action="search.php" method="post">
			<div class="input-group" id="for_Search">
                <input type="text" class="form-control" name="searcher" placeholder="Search" id="area" required />
                <span class="input-group-btn">
                <button type="submit" class="btn btn-default" role="button" name="add_button" id="sbutton"><i class="glyphicon glyphicon-search" id="search_glyph"></i></button>
                </span>
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
        <?php

        $sql1 = 'SELECT clients.client_id, cases.case_id, clients.classification, clients.representative_last_name, clients.address, clients.representative_first_name, cases.date_of_release, cases.date_of_maturity, cases.loan_amount, cases.actual_total_balance, cases.status FROM clients, cases WHERE clients.representative_last_name like "%'.$name.'%" OR clients.representative_first_name like "%'.$name.'%" OR clients.company_name like "%'.$name.'%"  OR clients.address like "%'.$name.'%"';

            $result = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
        ?>
                    <tr>
                        <td class="container"><?php echo $row['representative_last_name'].", ".$row['representative_first_name']?></td>
                        <td class="container" id="logo_column"><a href="editclient.php?value=<?php echo $row['client_id']?>"><i class="glyphicon glyphicon-pencil" id="icons"></i></a><a href="input.php?client=<?php echo $row['client_id']?>&case=<?php echo $row['case_id']?>"><i class="glyphicon glyphicon-plus" id="icons"></i></a><a href="addcase.php?value=<?php echo $row['client_id']?>" id=><i class="glyphicon glyphicon-level-up" id="icons"></i></a></td>
                        <td class="container" id="center_column"><?php echo $row['date_of_release']?></td>
                        <td class="container" id="center_column"><?php echo $row['date_of_maturity']?></td>
                        <td class="container" id="money"><?php echo $row['loan_amount']?></td>
                        <td class="container" id="money"><?php echo $row['actual_total_balance']?></td>
                        <td class="container" id="center_column"><?php echo $row['status']?></td>
                    </tr>

            <?php
                }
            }
            ?>
            </tbody>
            </table>
    </div>



<!--- pagination in case kailangan 
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
-->

