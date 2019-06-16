<?php
               $tablename = 'ScrumTeam';
               $teamid = $_POST['teamid'];
               $memNames = $_POST['memname'];
               $memRoles = $_POST['memerole'];
               for ($i = 0; $i < count($memNames); $i++) {
                    $name = $memNames[$i];
                    $email = $memEmail[$i];
                    $role = $memRoles[$i];
                    $wpdb->insert( $tablename, array(
                        'TeamId' => $teamid,
                        'Name' => $name,
                        'RoleId' => $role ),
                    array( '%s', '%s', '%s', '%s')
                 );
               }
          }