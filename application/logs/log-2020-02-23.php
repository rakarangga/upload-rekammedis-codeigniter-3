<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-02-23 04:44:15 --> Severity: error --> Exception: Unable to locate the model you have specified: Directory_m D:\webserver@raka\htdocs\rekam_medis\system\core\Loader.php 344
ERROR - 2020-02-23 04:51:39 --> Severity: error --> Exception: Call to a member function get_dropdown_tahun() on null D:\webserver@raka\htdocs\rekam_medis\application\controllers\backoffice\Dashboard.php 25
ERROR - 2020-02-23 04:51:45 --> Severity: error --> Exception: Call to a member function get_dropdown_tahun() on null D:\webserver@raka\htdocs\rekam_medis\application\controllers\backoffice\Dashboard.php 25
ERROR - 2020-02-23 05:23:41 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\rekam_medis\application\controllers\backoffice\Direktori.php 198
ERROR - 2020-02-23 05:25:00 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\rekam_medis\application\controllers\backoffice\Direktori.php 198
ERROR - 2020-02-23 05:26:37 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\rekam_medis\application\controllers\backoffice\Direktori.php 198
ERROR - 2020-02-23 05:26:59 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\rekam_medis\application\controllers\backoffice\Direktori.php 198
ERROR - 2020-02-23 05:28:06 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\rekam_medis\application\controllers\backoffice\Direktori.php 199
ERROR - 2020-02-23 05:41:12 --> Severity: error --> Exception: syntax error, unexpected '}', expecting ',' or ';' D:\webserver@raka\htdocs\rekam_medis\application\views\backoffice\berkas\index.php 78
ERROR - 2020-02-23 05:43:18 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\rekam_medis\application\controllers\backoffice\Direktori.php 199
ERROR - 2020-02-23 05:44:33 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\webserver@raka\htdocs\rekam_medis\application\controllers\backoffice\Direktori.php 199
ERROR - 2020-02-23 05:50:26 --> Severity: error --> Exception: syntax error, unexpected '[', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' D:\webserver@raka\htdocs\rekam_medis\application\controllers\backoffice\Direktori.php 196
ERROR - 2020-02-23 06:17:12 --> Query error: Incorrect datetime value: '1' for column 'created' at row 1 - Invalid query: INSERT INTO `t_directory` (`tgldirectory`, `namadirectory`, `stts`, `created`, `modified`, `id_user`) VALUES ('2020-02-01', '2020-02-01', '1', '1', '2020-02-23 06:17:12', '1')
ERROR - 2020-02-23 06:18:34 --> Query error: Incorrect datetime value: '1' for column 'created' at row 1 - Invalid query: INSERT INTO `t_directory` (`tgldirectory`, `namadirectory`, `stts`, `created`, `modified`, `id_user`) VALUES ('2020-02-02', '2020-02-02', '1', '1', '2020-02-23 06:18:34', '1')
ERROR - 2020-02-23 07:53:56 --> Query error: Unknown column 't_pasien.tgl_directory' in 'group statement' - Invalid query: SELECT *
FROM `t_directory`
GROUP BY YEAR(t_pasien.tgl_directory)
ORDER BY `t_directory`.`modified` DESC
ERROR - 2020-02-23 07:54:13 --> Query error: Unknown column 't_pasien.tgl_directory' in 'group statement' - Invalid query: SELECT *
FROM `t_directory`
GROUP BY YEAR(t_pasien.tgl_directory)
ORDER BY `t_directory`.`modified` DESC
ERROR - 2020-02-23 07:54:23 --> Query error: Unknown column 't_pasien.tgl_directory' in 'group statement' - Invalid query: SELECT *
FROM `t_directory`
GROUP BY YEAR(t_pasien.tgl_directory)
ORDER BY `t_directory`.`modified` DESC
ERROR - 2020-02-23 07:54:34 --> Query error: Unknown column 't_directory.tgl_directory' in 'group statement' - Invalid query: SELECT *
FROM `t_directory`
GROUP BY YEAR(t_directory.tgl_directory)
ORDER BY `t_directory`.`modified` DESC
ERROR - 2020-02-23 08:24:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%%' ESCAPE '!'
ORDER BY `t_directory`.`modified` DESC
 LIMIT 10' at line 3 - Invalid query: SELECT *
FROM `t_directory`
WHERE  LIKE '%%' ESCAPE '!'
ORDER BY `t_directory`.`modified` DESC
 LIMIT 10
