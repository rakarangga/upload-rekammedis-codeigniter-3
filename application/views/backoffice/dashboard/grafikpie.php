								<script>
								$(document).ready(function(e) {
									Morris.Donut({
										element: 'morris-donut-chart11',
										// data: [{label:"2019-02-19", value:"5"},{label:"2020-02-19", value:"4"},{label:"2019-01-19", value:"4"}],
										data: <?=$data?>,
										resize: true,
										// colors:['#EEA6AC','#0073B7','#0473B7']
										colors:[<?=$color?>]
									});
								});
								</script>
				<div id="morris-donut-chart11" height="155" style="height: 155px;"></div>