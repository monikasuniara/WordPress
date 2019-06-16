<?php
$teamid =  $_REQUEST['teamid'];
    $startDate = $_REQUEST['startDate'];
    $endDate = $_REQUEST['endDate'];
    $NumOfDays = $_REQUEST['NumOfDays'];
    $sprintNum = $_REQUEST['sprintNum'];
    $allocations = $_REQUEST['allocation'];
    $memberids = $_REQUEST['memberid'];
    $leaves = $_REQUEST['leaves'];

    $tablename = "TeamSprint";
    $wpdb->insert( $tablename, array(
                    'SprintNumber' => $sprintNum,
                    'TeamId' => $teamid,
                    'StartDate' => $startDate,
                    'EndDate' => $endDate,
                    'TotalDays' => $NumOfDays ),
                array( '%s', '%s', '%s', '%s')
             );
   $sprintid = $wpdb->insert_id;

   $tablename = "TeamAllocation";
   for ($i = 0; $i < count($allocations); $i++) {
       $allocation = $allocations[$i];
       $leave = $leaves[$i];
       $memberid = $memberids[$i];
       $wpdb->insert( $tablename, array(
           'SprintId' => $sprintid,
           'MemberId' => $memberid,
           'Allocation' => $allocation,
           'Leaves' => $leave ),
       array( '%s', '%s', '%s', '%s')
    );
  }