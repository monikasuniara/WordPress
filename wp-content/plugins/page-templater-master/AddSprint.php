<?php
    $result = $wpdb->get_results("SELECT * FROM ScrumTeam T"
                    . " Inner Join ScrumRole R on R.RoleId = T.RoleId "
                    . " where TeamId = " . $_REQUEST['team']);
?>
<form>
    <label>Sprint Number</label>
    <select id="sprintNum" name="sprintNum">
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
        <option value=5>5</option>
        <option value=6>6</option>
        <option value=7>7</option>
        <option value=8>8</option>
    </select>
    <label>Start Date</label>
    <input type="text" name="startDate" id="startDate" alt="date" class="IP_calendar" title="d/m/Y" />
    <label>End Date</label>
    <input type="text" name="endDate" id="endDate" alt="date" class="IP_calendar" title="d/m/Y" />
    <label>Number of Days in Sprint</label>
    <input type="text" name="NumOfDays" id="NumOfDays" />
        <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Allocation</th>
                        <th>Leaves/Training/Any Other Not work Day</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                            foreach ($result as $team) {
                                 echo  '<tr>';
                                 echo '<td>' . $team->Name .
                                        '<input type="hidden" name="memberid[]" id="memberid[]" value="' . $team->MemberId . '"' .
                                        '</td>';
                                 ?>
                                 <td>
                                 <select id="allocation[]" name="allocation[]">
                                         <option value=100>100</option>
                                         <option value=90>90</option>
                                         <option value=80>80</option>
                                         <option value=70>70</option>
                                         <option value=60>60</option>
                                         <option value=50>50</option>
                                         <option value=40>40</option>
                                         <option value=30>30</option>
                                         <option value=20>20</option>
                                         <option value=10>10</option>
                                         <option value=0>0</option>
                                 </select>
                                 </td>
                                 <td>
                                 <select id="leaves[]" name="leaves[]">
                                    <option value=1>0</option>
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                    <option value=5>5</option>
                                    <option value=6>6</option>
                                    <option value=7>7</option>
                                    <option value=8>8</option>
                                    <option value=8>9</option>
                                    <option value=8>10</option>
                                    </select>
                                 </td>
                                 <?php
                                 echo '</tr>';
                             }
                     ?>
                </tbody>
            </table>
            <input type="hidden" name="teamid" id="teamid" value="<?php echo $_REQUEST['team'] ?>" />
            <input type="hidden" name="action" id="action" value="savesprint" />
            <input name="submit" type="submit" value="Save Sprint" />
    </form>
