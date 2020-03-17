<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-03-13 05:47:54 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\RestMenu.php 12
ERROR - 2020-03-13 05:59:53 --> Severity: error --> Exception: Class 'REST_Controller' not found D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\api\Example.php 56
ERROR - 2020-03-13 06:35:48 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\api\Pasien.php 70
ERROR - 2020-03-13 06:36:19 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\api\Pasien.php 70
ERROR - 2020-03-13 06:37:29 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\api\Pasien.php 70
ERROR - 2020-03-13 07:00:27 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\api\Pasien.php 76
ERROR - 2020-03-13 07:02:24 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\api\Pasien.php 75
ERROR - 2020-03-13 07:02:33 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\api\Pasien.php 75
ERROR - 2020-03-13 07:03:18 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\api\Pasien.php 75
ERROR - 2020-03-13 07:27:36 --> Severity: error --> Exception: Call to a member function get_berkas_by() on null D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\api\Berkas.php 30
ERROR - 2020-03-13 07:34:37 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\api\Berkas.php 65
ERROR - 2020-03-13 22:35:03 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `t_pasien`
WHERE `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:03 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:03 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE DATE(created) = '2020-03-13'
AND `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:03 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:03 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `t_pasien`
WHERE `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:03 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE DATE(created) = '2020-03-13'
AND `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:03 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `t_berkas`
ORDER BY `t_berkas`.`modified` DESC
ERROR - 2020-03-13 22:35:03 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `t_pasien`
WHERE `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:03 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `t_berkas`
ORDER BY `t_berkas`.`modified` DESC
ERROR - 2020-03-13 22:35:03 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `t_berkas`
ORDER BY `t_berkas`.`modified` DESC
ERROR - 2020-03-13 22:35:03 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:04 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `t_berkas`
ORDER BY `t_berkas`.`modified` DESC
ERROR - 2020-03-13 22:35:04 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:04 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `t_pasien`
WHERE `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:05 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:05 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE DATE(created) = '2020-03-13'
AND `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:06 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `t_pasien`
WHERE `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:06 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE DATE(created) = '2020-03-13'
AND `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:06 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:06 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE DATE(created) = '2020-03-12'
AND `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:06 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:07 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:07 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:07 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:07 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:07 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE DATE(created) = '2020-03-13'
AND `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:07 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:07 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:07 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE DATE(created) = '2020-03-12'
AND `stts` = 1
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 22:35:07 --> Query error: MySQL server has gone away - Invalid query: SELECT SUM(`stts`) AS `stts`
FROM `t_pasien`
WHERE `stts` = 1 AND (`created` BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-13 23:16:52 --> Unable to connect to the database
