<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-02-21 06:36:24 --> Query error: Unknown column 't_berkas.namalengkap' in 'where clause' - Invalid query: SELECT *
FROM `t_berkas`
LEFT JOIN `t_acs_nm` as `b` ON `t_berkas`.`iduserlevel` = `b`.`id`
WHERE `t_berkas`.`namalengkap` LIKE '%%' ESCAPE '!'
OR  `t_berkas`.`email` LIKE '%%' ESCAPE '!'
OR  `t_berkas`.`namauser` LIKE '%%' ESCAPE '!'
OR  `b`.`an_name` LIKE '%%' ESCAPE '!'
ORDER BY `t_berkas`.`modified` DESC
 LIMIT 10
ERROR - 2020-02-21 06:46:32 --> Query error: Unknown column 't_directory.namadirecory' in 'where clause' - Invalid query: SELECT *
FROM `t_directory`
WHERE `t_directory`.`namadirecory` LIKE '%%' ESCAPE '!'
OR  `t_directory`.`tgldirectory` LIKE '%%' ESCAPE '!'
ORDER BY `t_directory`.`modified` DESC
 LIMIT 10
ERROR - 2020-02-21 06:46:56 --> Query error: Unknown column 't_directory.namadirecory' in 'where clause' - Invalid query: SELECT *
FROM `t_directory`
WHERE `t_directory`.`namadirecory` LIKE '%%' ESCAPE '!'
OR  `t_directory`.`tgldirectory` LIKE '%%' ESCAPE '!'
ORDER BY `t_directory`.`modified` DESC
 LIMIT 10
ERROR - 2020-02-21 06:47:37 --> Query error: Unknown column 't_directory.namadirecory' in 'where clause' - Invalid query: SELECT *
FROM `t_directory`
WHERE `t_directory`.`namadirecory` LIKE '%%' ESCAPE '!'
OR  `t_directory`.`tgldirectory` LIKE '%%' ESCAPE '!'
ORDER BY `t_directory`.`modified` DESC
 LIMIT 10
ERROR - 2020-02-21 06:48:34 --> Query error: Unknown column 't_directory.namadirecory' in 'where clause' - Invalid query: SELECT *
FROM `t_directory`
WHERE `t_directory`.`namadirecory` LIKE '%%' ESCAPE '!'
OR  `t_directory`.`tgldirectory` LIKE '%%' ESCAPE '!'
ORDER BY `t_directory`.`modified` DESC
 LIMIT 10
ERROR - 2020-02-21 06:49:34 --> Query error: Unknown column 't_directory.namadirtecory' in 'where clause' - Invalid query: SELECT *
FROM `t_directory`
WHERE `t_directory`.`namadirtecory` LIKE '%%' ESCAPE '!'
OR  `t_directory`.`tgldirectory` LIKE '%%' ESCAPE '!'
ORDER BY `t_directory`.`modified` DESC
 LIMIT 10
ERROR - 2020-02-21 06:49:55 --> Query error: Unknown column 't_berkas.namalengkap' in 'where clause' - Invalid query: SELECT *
FROM `t_berkas`
LEFT JOIN `t_acs_nm` as `b` ON `t_berkas`.`iduserlevel` = `b`.`id`
WHERE `t_berkas`.`namalengkap` LIKE '%%' ESCAPE '!'
OR  `t_berkas`.`email` LIKE '%%' ESCAPE '!'
OR  `t_berkas`.`namauser` LIKE '%%' ESCAPE '!'
OR  `b`.`an_name` LIKE '%%' ESCAPE '!'
ORDER BY `t_berkas`.`modified` DESC
ERROR - 2020-02-21 07:02:53 --> Severity: error --> Exception: Call to undefined function btn_koreksi_icon() D:\webserver@raka\htdocs\rekam_medis\application\controllers\backoffice\Berkas.php 30
ERROR - 2020-02-21 21:21:25 --> Unable to connect to the database
