<?php
    /* Template Name: DynamicTable */
    global $wpdb;
    include("TemplateHeader.php");
?>

<?php
if ( isset( $_REQUEST['action'] ) &&  $_REQUEST['action'] == 'team') {
    include("Team.php");
} //End of $_REQUEST['action'] == 'team'
else if ( isset( $_REQUEST['action'] ) &&  $_REQUEST['action'] == 'sprints') {
    include("Sprints.php");
}//End of $_REQUEST['action'] == 'sprints'
else if ( isset( $_REQUEST['action'] ) &&  $_REQUEST['action'] == 'addsprint') {
    include("AddSprint.php");
}// End of $_REQUEST['action'] == 'addsprint'
else if ( isset( $_REQUEST['action'] ) &&  $_REQUEST['action'] == 'savesprint') {
    include("SaveSprint.php");
   echo("<script>location.href = '" . home_url() . "'</script>");
}//end of $_REQUEST['action'] == 'savesprint'
else if ( isset( $_REQUEST['action'] ) &&  $_REQUEST['action'] == 'saveteam') {
    include("SaveTeam.php");
} else {
    include("Home.php");
} //end of else
include("TemplateFooter.php");
