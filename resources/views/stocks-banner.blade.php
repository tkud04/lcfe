
<!-- banner-bottom -->
	<div class="banner-bottom wow fadeInUp">
		<div class="panel panel-default agile_panel">
			<div class="panel-body agile_panel_body">
				<ul class="demo1">
				    @foreach($stockChunks as $stocks)
					<li class="news-item">
						<table class="w3_table_trade">					    
							<tr>
							    @foreach($stocks as $s)
								<?php
								  $pcc = "caret"; $icc = "01A9CE";
								  if($s.PercChange >= 0){
									  $icc = "#00AA00";
									  $pcc = "caret caret1";
								  }
								?>
								<td class="w3_agileits_td demo1_w3_table_trade">
									<table class="agileits_w3layouts_table">
										<tr>
											<td style="color:{{$icc}};text-transform:uppercase;">{{$s.SYMBOL}}</td>
										</tr>
										<tr>
											<td>{{$s.Value}}<i><span class="{{$pcc}}"></span>({{$s.PercChange}}%)</i></td>
										</tr>
									</table>
								</td>
								@endforeach
							</tr>
						</table>
					</li>
					@endforeach
				</ul>
			</div>
		<div class="panel-footer"> </div>
		</div>
        <!--
		<div class='agileinfo_marquee'>
			<div data-speed="10" class="marquee">
				<ul>
					<li><a href="single.html">NPAs of associate banks to weigh on SBI: Religare Capital<span>\</span></a></li>
					<li><a href="single.html">Julius Baer analyst sees opportunities in despised China market</a></li>
				</ul>
			</div>
		</div>
		-->
	</div>
<!-- //banner-bottom -->
<!---728x90--->