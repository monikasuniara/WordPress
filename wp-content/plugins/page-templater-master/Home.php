<?php
$table = "teams";
  $result = $wpdb->get_results("SELECT * FROM teams");
      ?>
      <table>
          <thead>
              <th>Team</th>
              <th>Action</th>
          </thead>
          <tbody>
      <?php
          foreach ($result as $team) {
             echo "<tr>";
             echo "<td>";
             echo "<a href='?team=" . $team->TeamId . "'>" . $team->Team . '</a>';
             echo "</td>";
             echo "<td>";
             echo "<a href='?action=team&team=" . $team->TeamId . "'>Show Team</a>";
             echo "<br/>";
             echo "<a href='?action=sprints&team=" . $team->TeamId . "'>Show Sprints</a>";
             echo "</td>";
             echo "<tr>";
           }
      ?>
      </tbody>
    </table>