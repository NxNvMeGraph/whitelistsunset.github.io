<?php
include 'header.php';
$player_list = $player_obj->player_list();
?>

<div class="container " > 
    <div class="row content">
        <a  href="create-player-info.php"  class="button button-purple mt-12 pull-right">Add a player to whitelist</a> 
        <h3>Whitelisted Players</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
	 <input  id="inputfilter" type="text" class="form-control" placeholder="Search" ></input>
		<table id="filterme" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Character Name</th>
                    <th>Steam Hex</th>
					<th>Discord ID</th>
                    <th>Discord Name</th>
                    <th>Whitelist Date</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody id="myTableBody">
<?php
if ($player_list->num_rows > 0) {
  while ($row = $player_list->fetch_assoc()) {
     ?>
             <tr>
				<td><?php echo $row["id"] ?></td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["steam"] ?></td>
				<td><?php echo $row["D_id"] ?></td>
				<td><?php echo $row["D_user"] ?></td>
				<td><?php echo $row["Date"] ?></td>
                
                <td class="text-right">
                    <a  href="<?php echo 'delete-player-info.php?id=' . $row["id"] ?>" class="button button-red">Delete</a>  
                    <a  href="<?php echo 'update-player-info.php?id=' . $row["id"] ?>" class="button button-blue">Edit</a>  
                    <a  href="<?php echo 'read-player-info.php?id=' . $row["id"] ?>" class="button button-green">View</a>
					
                </td>
            </tr>
    <?php
    }
}
?>
           </tbody>
		   
		   
		   <tfoot>
    <tr>
      <th>ID</th>
                    <th>Character Name</th>
                    <th>Steam Hex</th>
					<th>Discord ID</th>
                    <th>Discord Name</th>
                    <th>Whitelist Date</th>
                    <th class="text-right">Action</th>
    </tr>
  </tfoot>
        </table>
</table>
<div class="col-md-12 text-center">
           <ul class="pagination pagination-lg pager" id="myPager"></ul>
       </div>
    </div>
</div>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	$("#inputfilter").keyup(function(){
		filter = new RegExp($(this).val(),'i');
		$("#filterme tbody tr").filter(function(){
			$(this).each(function(){
				found = false;
				$(this).children().each(function(){
					content = $(this).html();
					if(content.match(filter))
					{
						found = true
					}
				});
				if(!found)
				{
					$(this).hide();
					
				}
				else
				{
					$(this).show();
					
				}
			});
		});
	});
});

</script>

<?php
include 'footer.php';
?>  

