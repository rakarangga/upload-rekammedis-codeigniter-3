<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-03-07 00:43:17 --> Severity: error --> Exception: syntax error, unexpected ';', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 202
ERROR - 2020-03-07 00:49:54 --> Severity: error --> Exception: Cannot access private property DatatablesBuilder::$dt_options D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 202
ERROR - 2020-03-07 00:50:12 --> Severity: error --> Exception: Call to undefined method DatatablesBuilder::dt_options() D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 202
ERROR - 2020-03-07 00:50:26 --> Severity: error --> Exception: Call to undefined method DatatablesBuilder::dt_options() D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 202
ERROR - 2020-03-07 00:50:28 --> Severity: error --> Exception: Call to undefined method DatatablesBuilder::dt_options() D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 202
ERROR - 2020-03-07 00:50:56 --> Severity: error --> Exception: Cannot access private property DatatablesBuilder::$dt_options D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 202
ERROR - 2020-03-07 01:06:17 --> Severity: error --> Exception: Call to undefined method Pasien_m::post() D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 202
ERROR - 2020-03-07 01:06:40 --> Severity: error --> Exception: Call to a member function post() on null D:\webserver@raka\htdocs\__2020\rekam_medis\application\libraries\DatatablesBuilder.php 199
ERROR - 2020-03-07 01:06:49 --> Severity: error --> Exception: Call to a member function post() on null D:\webserver@raka\htdocs\__2020\rekam_medis\application\libraries\DatatablesBuilder.php 125
ERROR - 2020-03-07 01:13:53 --> Severity: error --> Exception: Call to a member function post() on null D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 202
ERROR - 2020-03-07 01:19:35 --> Severity: error --> Exception: syntax error, unexpected '}' D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 203
ERROR - 2020-03-07 01:21:23 --> Severity: error --> Exception: Call to a member function post() on null D:\webserver@raka\htdocs\__2020\rekam_medis\application\libraries\DatatablesBuilder.php 296
ERROR - 2020-03-07 02:53:57 --> Severity: error --> Exception: [] operator not supported for strings D:\webserver@raka\htdocs\__2020\rekam_medis\application\libraries\DatatablesBuilder.php 326
ERROR - 2020-03-07 02:54:33 --> Severity: error --> Exception: Call to undefined method Datatables::json() D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 202
ERROR - 2020-03-07 02:54:45 --> Severity: error --> Exception: [] operator not supported for strings D:\webserver@raka\htdocs\__2020\rekam_medis\application\libraries\DatatablesBuilder.php 326
ERROR - 2020-03-07 04:19:24 --> Severity: error --> Exception: Call to a member function order_by() on null D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 103
ERROR - 2020-03-07 04:19:26 --> Severity: error --> Exception: Call to a member function order_by() on null D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 103
ERROR - 2020-03-07 04:20:04 --> Severity: error --> Exception: Call to a member function order_by() on null D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 103
ERROR - 2020-03-07 04:21:07 --> Severity: error --> Exception: Call to a member function order_by() on null D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 103
ERROR - 2020-03-07 04:22:45 --> Severity: error --> Exception: Call to a member function order_by() on null D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 103
ERROR - 2020-03-07 04:55:21 --> Severity: error --> Exception: Call to undefined method Pasien_m::getDataTable() D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\backoffice\Berkas.php 28
ERROR - 2020-03-07 04:55:48 --> Severity: error --> Exception: Call to a member function result() on unknown D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 115
ERROR - 2020-03-07 04:57:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '*
FROM `t_pasien`
WHERE `iddirectory` = 'V'
AND `id_user` = '6'
OR  `t_pasien`.`' at line 1 - Invalid query: SELECT *, *
FROM `t_pasien`
WHERE `iddirectory` = 'V'
AND `id_user` = '6'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:10:27 --> Query error: Unknown column 't_pasieniddirectory' in 'where clause' - Invalid query: SELECT *
FROM `t_pasien`
WHERE `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
AND `t_pasieniddirectory` = '1'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:12:18 --> Query error: Unknown column 't_pasien.id_directory' in 'where clause' - Invalid query: SELECT *
FROM `t_pasien`
WHERE `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
AND `t_pasien`.`id_directory` = '51'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:13:04 --> Query error: Unknown column 't_pasien.iddirectory' in 'where clause' - Invalid query: SELECT *
FROM `logis_users`
WHERE `t_pasien`.`iddirectory` = 5
AND `iduser` = 6
ORDER BY `modified` DESC
ERROR - 2020-03-07 05:15:20 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:16:17 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:17:01 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `namapasien` LIKE '%%' ESCAPE '!'
OR  `norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:17:24 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `namapasien` LIKE '%%' ESCAPE '!'
OR  `norm` LIKE '%%' ESCAPE '!'
ORDER BY `modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:21:14 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:21:56 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:23:26 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:24:14 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:28:24 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:28:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '*
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasi' at line 1 - Invalid query: SELECT *, *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:30:59 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-07 05:31:02 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-07 05:32:39 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:34:32 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:50:31 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:51:19 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-07 05:51:51 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-07 05:51:56 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 05:59:02 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = '1'
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
AND `iddirectory` = '1'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 06:03:26 --> Severity: error --> Exception: Call to undefined method Pasien_m::getDataTable_Query() D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 120
ERROR - 2020-03-07 06:07:50 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = 5
OR  `t_pasien`.`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-07 06:07:59 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = 5
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-07 06:08:57 --> Query error: Not unique table/alias: 't_pasien' - Invalid query: SELECT *
FROM `t_pasien`, `t_pasien`
WHERE `iddirectory` = 5
ORDER BY `t_pasien`.`modified` DESC
ERROR - 2020-03-07 06:10:48 --> Severity: error --> Exception: Call to undefined method Pasien_m::getDatatable_init() D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\backoffice\Berkas.php 79
ERROR - 2020-03-07 06:26:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasi' at line 4 - Invalid query: SELECT *
FROM `t_pasien`
WHERE `iddirectory` = 1
OR  .`namapasien` LIKE '%%' ESCAPE '!'
OR  `t_pasien`.`norm` LIKE '%%' ESCAPE '!'
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 06:37:15 --> Severity: error --> Exception: Call to undefined method Pasien_m::getDataTable() D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\backoffice\Berkas.php 32
ERROR - 2020-03-07 06:41:18 --> Severity: error --> Exception: Call to undefined method stdClass::result() D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 116
ERROR - 2020-03-07 08:02:37 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT *
FROM `t_pasien`
WHERE `iddirectory` = '1'
AND `status` =0
AND `id_user` = '6'
ORDER BY `modified` DESC
 LIMIT 10
ERROR - 2020-03-07 08:05:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `id_user` = '6'
ORDER BY `modified` DESC
 LIMIT 10' at line 4 - Invalid query: SELECT *, `id_pasien`
FROM `t_berkas`, `t_pasien`
WHERE `iddirectory` = '1'
AND `id` NOT IN()
AND `id_user` = '6'
ORDER BY `modified` DESC
 LIMIT 10
ERROR - 2020-03-07 08:05:53 --> Severity: error --> Exception: Call to undefined method Berkas_m::select() D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 83
ERROR - 2020-03-07 08:09:48 --> Query error: Column 'modified' in order clause is ambiguous - Invalid query: SELECT *
FROM `t_pasien`
LEFT JOIN `t_directory` ON `t_pasien`.`iddirectory` = `t_directory`.`id`
WHERE YEAR(t_directory.tgldirectory) = 2012
AND `t_pasien`.`jeniskelamin` = 'P'
ORDER BY `modified` DESC
ERROR - 2020-03-07 08:09:54 --> Query error: Column 'modified' in order clause is ambiguous - Invalid query: SELECT *
FROM `t_pasien`
LEFT JOIN `t_directory` ON `t_pasien`.`iddirectory` = `t_directory`.`id`
WHERE YEAR(t_directory.tgldirectory) = 2012
AND `t_pasien`.`jeniskelamin` = 'P'
ORDER BY `modified` DESC
ERROR - 2020-03-07 08:15:25 --> Query error: Unknown column 'aid' in 'where clause' - Invalid query: SELECT *
FROM `t_pasien`
WHERE `id_user` = '6'
AND `aid` NOT IN('select idpasien from t_berkas')
ORDER BY `t_pasien`.`modified` DESC
 LIMIT 10
ERROR - 2020-03-07 10:12:41 --> Severity: error --> Exception: syntax error, unexpected '=>' (T_DOUBLE_ARROW), expecting ',' or ')' D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 88
ERROR - 2020-03-07 10:12:59 --> Severity: error --> Exception: syntax error, unexpected '$arr' (T_VARIABLE) D:\webserver@raka\htdocs\__2020\rekam_medis\application\models\Pasien_m.php 149
ERROR - 2020-03-07 15:28:41 --> Severity: error --> Exception: Call to undefined function btn_hapus_icon() D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\backoffice\Berkas.php 39
ERROR - 2020-03-07 23:58:31 --> Severity: error --> Exception: Call to a member function hapus() on null D:\webserver@raka\htdocs\__2020\rekam_medis\application\controllers\backoffice\Berkas.php 299
