<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer

// ADD TOOLTIPS!!!!!!!!!!!!!! :---)

?> 
	<div id="with_searchbar">
		<h1 id="h1_view">VIEW ALL OFFICERS</h1>
	</div>
	<div class="table-responsive" id="view_all_table">
        <table class="table table-striped table-hover">
          <thead id="colored_head">
            <tr>
                <th id="client_head">NAME</th>
                <th id="release2_head"> </th>
                <th id="release3_head">EMAIL</th>
                <th id="release3_head">ADDRESS</th>
                <th id="release_head">CONTACT NO</th>
                <th id="release_head">NOTES</th>
                <th id="icons_head">CASES</th>
                <th id="release_head">FINISHED CASES</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include ('database.php');

            $sql = "SELECT account_id,accounts.last_name, accounts.first_name, accounts.email, accounts.address, accounts.contact_number, accounts.notes FROM accounts WHERE account_type!='Closed';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
        ?>
                    <tr>
                        <td class="container"><?php echo $row['last_name'].", ".$row['first_name']?></td>
                        <td class="container" id="logo_column"><a href="editofficer.php?value=<?php echo $row['account_id']?>"><i class="glyphicon glyphicon-pencil" id="icons"></i></a> <a href="deleter.php?type=1&id=<?php echo $row['account_id']?>"><i class="glyphicon glyphicon-remove" id="icons"></i></a></td>
                        <td class="container" id="center_column"><?php echo $row['email']?></td>
                        <td class="container" id="center_column"><?php echo $row['address']?></td>
                        <td class="container" id="center_column"><?php echo $row['contact_number']?></td>
                        <td class="container" id="center_column"><?php echo $row['notes']?></td>
                        <td class="container" id="center_column"><?php echo "1"?></td>
                        <td class="container" id="center_column"><?php echo "0"?></td>
                    </tr>

            <?php
                }
            }
            ?>
            </tbody>
            </table>
    </div>