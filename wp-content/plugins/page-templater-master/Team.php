<script type="text/javascript">
    $(document).ready(function(){
        $(".add-row").click(function(){
            var name = $("#name").val();
            $("#name").val('');
            var role = $( "select#role" ).val();
            var roleText = $( "select#role option:selected" ).text();
            var markup = "<tr><td><input type='checkbox' name='record'></td>" +
                           "<td>" + name + "<input type=hidden name='memname[]' value='" + name + "'" + "</td>" +
                           "<td>" + roleText + "<input type=hidden name='memerole[]' value='" + role + "'" + "</td>" +
                           "</tr>";
            $("table tbody").append(markup);
        });

        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });
</script>
<?php
$result = $wpdb->get_results("SELECT * FROM ScrumTeam T"
                . " Inner Join ScrumRole R on R.RoleId = T.RoleId "
                . " where TeamId = " . $_REQUEST['team']);

     $roles = $wpdb->get_results("SELECT * FROM ScrumRole order by RoleId DESC");
?>
<form method="post" action="<?php echo $PHP_SELF;?>">
        <input type="text" id="name" placeholder="Name">
        <select name="role" id="role">
        <?php
            foreach ($roles as $role) {
                 echo  '<option value=' . $role->RoleId . '>' . $role->Role . '</option>' ;
             }
        ?>
        </select>
    	<input type="button" class="add-row" value="Add New Member">
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
             <?php
                    foreach ($result as $team) {
                         echo  '<tr>';
                         echo '<td><input type="checkbox" name="record"></td>';
                         echo '<td>' . $team->Name . '</td>';
                         echo '<td>' . $team->Role . '</td>';
                         echo '</tr>';
                     }
             ?>
        </tbody>
    </table>
    <button type="button" class="delete-row">Remove Member</button>
    <input type="hidden" name="teamid" id="teamid" value="<?php echo $_REQUEST['team'] ?>" />
    <input type="hidden" name="action" id="action" value="saveteam" />
    <input name="submit" type="submit" value="Save Team" />
    </form>