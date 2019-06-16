<?php
$team = $_REQUEST['team'];
    echo "<a href='?action=addsprint&team=" . $team . "'>Add New Sprint</a><br />";
    $sql = "SELECT * FROM `TeamSprint` S "
        . "INNER JOIN Teams T ON S.TeamId = T.TeamId "
        . "WHERE S.TeamId = " . $_REQUEST['team'];
    $result = $wpdb->get_results($sql);
    foreach ($result as $sprint) {
        echo "<h4>$sprint->Team's Sprint " .
        "$sprint->SprintNumber " .
        "Start Date: $sprint->StartDate " .
        "End Date: $sprint->EndDate " .
        "Total Days: $sprint->TotalDays</h4>";
        $daysInSprint = $sprint->TotalDays;
        $agileCeremony = $sprint->AgileCeremony;
        $velocity = $sprint->TeamVelocity;

    $result = $wpdb->get_results("SELECT * FROM TeamAllocation A " .
                    " INNER JOIN ScrumTeam T ON A.MemberId = T.MemberId " .
                    " Inner Join ScrumRole R on R.RoleId = T.RoleId " .
                    " where TeamId = " . $_REQUEST['team'] .
                    " AND A.SprintId = " . $sprint->SprintId);
?>
<table>
    <thead>
        <th>Days In Sprint</th>
        <th>Team Member</th>
        <th>Allocation to Squad Work</th>
        <th>Holidays/<br/>Leaves/<br/>Innovation Days</th>
        <th>Baseline Allocation</th>
        <th>Less Agile</th>
        <th>Adjusted Capacity Per Sprint</th>
        <th>Epic</th>
        <th>BAU</th>
        <th>Discovery</th>
        <th>Epic Days Per Sprint</th>
        <th>BAU Days Per Sprint</th>
        <th>Discovery Days Per Sprint</th>
        <th>Epic Story Points Per Sprint</th>
        <th>BAU Story Points Per Sprint</th>
        <th>Discovery Story Points Per Sprint</th>
    </thead>
    <tbody>
<?php
    foreach ($result as $team) {
       $allocation = $team->Allocation;
       $leaves = $team->Leaves;
       $epic = $team->Epic;
       $bau = $team->BAU;
       $discovery = $team->Discovery;
       $baselineAllocation = ($daysInSprint - $leaves) * ($allocation/100);
       $lessAgile = $daysInSprint * ($agileCeremony/100);
       $adjustedCapacity = $baselineAllocation - $lessAgile;
       $epicDaysPerSprint = $adjustedCapacity * ($epic/100);
       $bauDaysPerSprint = $adjustedCapacity * ($bau/100);
       $disDaysPerSprint = $adjustedCapacity * ($discovery/100);
       $epicPointsPerSprint = $epicDaysPerSprint + ($epicDaysPerSprint * $velocity);
       $bauPointsPerSprint = $bauDaysPerSprint + ($bauDaysPerSprint * $velocity);
       $disPointsPerSprint = $disDaysPerSprint + ($disDaysPerSprint * $velocity);

       $tableData[0] = $daysInSprint;
       $tableData[1] = $team->Name;
       $tableData[2] = $allocation;
       $tableData[3] = $leaves;
       $tableData[4] = $baselineAllocation;
       $tableData[5] = $lessAgile;
       $tableData[6] = $adjustedCapacity;
       $tableData[7] = $epic;
       $tableData[8] = $bau;
       $tableData[9] = $discovery;
       $tableData[10] = $epicDaysPerSprint;
       $tableData[11] = $bauDaysPerSprint;
       $tableData[12] = $disDaysPerSprint;
       $tableData[13] = $epicPointsPerSprint;
       $tableData[14] = $bauPointsPerSprint;
       $tableData[15] = $disPointsPerSprint;

       echo "<tr>";
       foreach($tableData as $cell => $cell_value) {
           echo "<td>";
           echo $cell_value;
           echo "</td>";
       }
      echo "</tr>";
   }
?>
 </tbody>
</table>
<?php
} //end of for each sprint