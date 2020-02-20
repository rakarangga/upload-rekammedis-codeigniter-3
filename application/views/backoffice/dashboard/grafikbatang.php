
   <script type="text/javascript">
							$(function () {

								chart = new Highcharts.Chart({
									chart: {
										type: 'column',
										renderTo: 'container_trend'
									},
									title: {
										text: 'PANTAUAN JUMLAH PENDAFTARAN PASIEN'
									},
									subtitle: {
										text: ''
									},
									xAxis: {
										type: 'category',
										labels: {
											rotation: -45,
											style: {
												fontSize: '13px',
												fontFamily: 'Verdana, sans-serif'
											}
										}
									},
									yAxis: {
										min: 0,
										title: {
											text: 'Jumlah '
										}
									},
									legend: {
										enabled: true
									},
                                    tooltip: {
                                                headerFormat: '<span style="font-size:15px">{point.key}</span><table>',
                                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                                             '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
                                                //pointFormat: 'Jumlah Kejadian Bencana: <b>{point.y:.1f}</b>'///ini kalau ada koma
										        // pointFormat: 'Jumlah : <b>{point.y:.0f}</b>', //standart
                                                footerFormat: '</table>',
                                                shared: true,
                                                useHTML: true
                                            },
									series: [
									{
										name: 'LAKI-LAKI',
										data: <?php echo $directory; ?>
									},
									
									{
										name: 'PEREMPUAN',
                                        data: <?php echo $pasien; ?>
                               
									},
									]
                                });
							});
									</script>	
<div id="container_trend" style="margin: 0 auto; height:100%;"></div>