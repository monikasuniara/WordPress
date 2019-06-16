<?php /* Template Name: DynamicTable */

get_header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery Add / Remove Table Rows Dynamically</title>
<style type="text/css">
    form{
        margin: 20px 0;
    }
    form input, button{
        padding: 5px;
    }
    table{
        width: 100%;
        margin-bottom: 20px;
		border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".add-row").click(function(){
            var name = $("#name").val();
            var email = $("#email").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" + email + "</td></tr>";
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
</head>
<body>
<?php
echo "Submit = " . $_POST['submit'];
if ( isset( $_POST['submit'] ) ) {
               global $wpdb;
               $tablename = $wpdb->prefix.'post_job';
               echo "table submitted";

//              $wpdb->insert( $tablename, array(
//                  'organizationname' => $_POST['organizationname'],
//                  'post' => $_POST['post'],
//                  'publishfrom' => $_POST['publishfrom'],
//                  'publishupto' => $_POST['publishupto'],
//                  'qualification1' => $_POST['qualification1'],
//                  'qualification2' => $_POST['qualification2'],
//                  'qualification3' => $_POST['qualification3'],
//                  'qualification4' => $_POST['qualification4'],
//                  'experience1' => $_POST['experience1'],
//                  'experience2' => $_POST['experience2'],
//                  'experience3' => $_POST['experience3'],
//                  'training1' => $_POST['training1'],
//                  'training2' => $_POST['training2'],
//                  'training3' => $_POST['training3'],
//                  'training4' => $_POST['training4'],
//                  'training5' => $_POST['training5'] ),
//                  array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
//              );
          } else {
          ?>
    <form method="post" action="<?php echo $PHP_SELF;?>">
        <input type="text" id="name" placeholder="Name">
        <input type="text" id="email" placeholder="Email Address">
    	<input type="button" class="add-row" value="Add Row">
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" name="record"></td>
                <td>Monika Suniara</td>
                <td>monika.suniara@anz.com</td>
            </tr>
        </tbody>
    </table>
    <button type="button" class="delete-row">Delete Row</button>
    <input name="submit" type="submit" value="Save Data" />
    </form>
</body>
</html>
<?php } ?>