CREATE TABLE `scrum`.`ScrumRole` ( `RoleId` INT(10) NOT NULL AUTO_INCREMENT , `Role` VARCHAR(2000) NOT NULL ,
                                  PRIMARY KEY (`RoleId`));

INSERT INTO `ScrumRole` (`RoleId`, `Role`) VALUES (NULL, 'Scrum Master');
INSERT INTO `ScrumRole` (`RoleId`, `Role`) VALUES (NULL, 'Product Owner');
INSERT INTO `ScrumRole` (`RoleId`, `Role`) VALUES (NULL, 'Team Member');

CREATE TABLE `scrum`.`Teams` ( `TeamId` INT(10) NOT NULL AUTO_INCREMENT , `Team` VARCHAR(2000) NOT NULL ,
                                  PRIMARY KEY (`TeamId`));
INSERT INTO `Teams` (`TeamId`, `Team`) VALUES (NULL, 'PaceKeepers');
INSERT INTO `Teams` (`TeamId`, `Team`) VALUES (NULL, 'Incredibles');
INSERT INTO `Teams` (`TeamId`, `Team`) VALUES (NULL, 'Gentoo');

CREATE TABLE `scrum`.`ScrumTeam` ( `MemberId` INT(10) NOT NULL AUTO_INCREMENT ,
                                  `TeamId` INT(10) NOT NULL ,
                                  `Name` VARCHAR(2000) NOT NULL ,
                                  `Email` VARCHAR(2000) NOT NULL ,
                                  `RoleId` INT(10) NOT NULL ,
                                  PRIMARY KEY (`MemberId`));

CREATE TABLE `scrum`.`TeamSprint` ( `SprintId` INT(10) NOT NULL AUTO_INCREMENT ,
                                  `SprintNumber` INT(10) NOT NULL ,
                                  `TeamId` INT(10) NOT NULL ,
                                  `StartDate` VARCHAR(2000) NOT NULL ,
                                  `EndDate` VARCHAR(2000) NOT NULL ,
                                  `TotalDays` INT(10) NOT NULL ,
                                  PRIMARY KEY (`SprintId`));
CREATE TABLE `scrum`.`TeamAllocation` ( `AllocationId` INT(10) NOT NULL AUTO_INCREMENT ,
                                  `SprintId` INT(10) NOT NULL ,
                                  `MemberId` INT(10) NOT NULL ,
                                  `Allocation` INT(10) NOT NULL DEFAULT '0';,
                                  `Leaves` INT(10) NOT NULL DEFAULT '0';,
                                  PRIMARY KEY (`AllocationId`));

