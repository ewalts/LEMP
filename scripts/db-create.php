<?PHP
/* Base table structure
)";
*/
$MyXs= array(
'DB_HOST' => '', 
'DB_USER' => '',
'DB_PASS' => '', 
'DB_NAME' => '' 
);
$dbc= new mysqli($MyXs['DB_HOST'], $MyXs['DB_USER'], $MyXs['DB_PASS'], $MyXs['DB_NAME']);
/*
$create_db=false;

 if(db_exists($MyXs[3])){
	echo "yes";
	$test=true; if($test==true){  ###>  test code

	$exists_action=readline("pevious database for rewble exists.\n"
	." (1) - Leave it alone\n"
        ." (2) - Delete and start fresh\n"
        ." (3) - Backup to dump file then delete and start fresh\n"
	." Make selection to continue. ");


	switch ($exists_action){
		case '1':
			$create_db=false;
			exit;
		case '2';
			$sql='drop database rewble_db';
			if(!mysqli_query($dbc,$sql)){
				$rewble_db->message_handler('E',"ERROR: Failed to delete original database rewble_db. mysql-[".mysqli_errno($dbc).'-'.mysqli_error($dbc)).']';
			}else{
				$rewble_db->create_database($dbc);
			}
			exit;
		case '3':
			$dump_db='';
	}
}else{
	$create_db=true;
}

//$dep_="CREATE DATABASE rewble_db";
*/
/*
$dep_types="
CREATE TABLE dep_types (
ID int unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
rMdate datetime default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
rCdate datetime NOT NULL
)";
*/
$deployment="(
CREATE TABLE rewdb_dep (
ID int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
dep_name varchar(100) NOT NULL,
dep_desc text,
type tinyint(3) not null,
rMdate datetime default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
rCdate datetime NOT NULL
)";
$vars_table="
CREATE TABLE `param` (
ID int unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
dep_id int not null,
task_id int,
param_name varchar(100) NOT NULL,
param_value text NOT NULL,
rMdate datetime default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
rCdate datetime NOT NULL,
FOREIGN KEY (dep_id ) REFERENCES rewdb_dep(ID) ON DELETE CASCADE
)";
$infra_table="
CREATE TABLE `infra` (
  `ID` int unsigned NOT NULL AUTO_INCREMENT,
  `asset_tag` int(5) unsigned zerofill DEFAULT NULL,
  `dev_name` varchar(30) NOT NULL DEFAULT '',
  `environment` varchar(60) DEFAULT NULL,
  `InProd` tinyint unsigned NOT NULL,
  `disposed` tinyint unsigned NOT NULL,
  `logged` tinyint unsigned NOT NULL,
  `priority` tinyint unsigned NOT NULL DEFAULT '0',
  `ip_addr` varchar(15) NOT NULL DEFAULT '',
  `net_dev_connection` varchar(30) DEFAULT NULL,
  `monitor_url` text,
  `snmpEnable` tinyint unsigned NOT NULL,
  `description` text,
  `dev_loc` varchar(30) NOT NULL DEFAULT '',
  `image_file` varchar(60) NOT NULL DEFAULT '',
  `dev_type` varchar(30) NOT NULL DEFAULT '',
  `services` text,
  `servicesID` text NOT NULL,
  `drives` text,
  `dev_man` varchar(30) NOT NULL DEFAULT '',
  `platform` varchar(30) NOT NULL DEFAULT '',
  `OS_base` varchar(15) DEFAULT NULL,
  `image_base` varchar(70) DEFAULT NULL,
  `domain` varchar(30) NOT NULL DEFAULT '',
  `dev_subnet` varchar(15) NOT NULL DEFAULT '',
  `support_info` text NOT NULL,
  `warranty_exp` date NOT NULL,
  `product_keys` text NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `PO_number` varchar(10) NOT NULL,
  `serial_number` varchar(60) NOT NULL,
  `model_number` varchar(70) DEFAULT NULL,
  `restore_test` datetime DEFAULT NULL,
  `CPU_info` varchar(20) DEFAULT NULL,
  `RAM_info` varchar(20) DEFAULT NULL,
  `HD_capacity` varchar(20) DEFAULT NULL,
  `warranty_info` text,
  `purchaseFrom` text NOT NULL,
  `purchaseDate` varchar(20) NOT NULL DEFAULT '',
  `RmDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
";

$table2="
CREATE TABLE `SystemEvents` (
  `ID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CustomerID` bigint DEFAULT NULL,
  `ReceivedAt` datetime DEFAULT NULL,
  `DeviceReportedTime` datetime DEFAULT NULL,
  `Facility` smallint DEFAULT NULL,
  `Priority` smallint DEFAULT NULL,
  `FromHost` varchar(60) DEFAULT NULL,
  `Message` text,
  `NTSeverity` int DEFAULT NULL,
  `Importance` int DEFAULT NULL,
  `EventSource` varchar(60) DEFAULT NULL,
  `EventUser` varchar(60) DEFAULT NULL,
  `EventCategory` int DEFAULT NULL,
  `EventID` int DEFAULT NULL,
  `EventBinaryData` text,
  `MaxAvailable` int DEFAULT NULL,
  `CurrUsage` int DEFAULT NULL,
  `MinUsage` int DEFAULT NULL,
  `MaxUsage` int DEFAULT NULL,
  `InfoUnitID` int DEFAULT NULL,
  `SysLogTag` varchar(60) DEFAULT NULL,
  `EventLogType` varchar(60) DEFAULT NULL,
  `GenericFileName` varchar(60) DEFAULT NULL,
  `SystemID` int DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=208016862 DEFAULT CHARSET=latin1;
";
$new_tables= array(
//$dep_types,
$deployment,
$vars_table,
$infra_table,
$table2);

for($i=0;$i<count($new_tables);$i++){
	if(!mysqli_query($dbc, $new_tables[$i])){
		echo (mysqli_error());
	}
}

?>
