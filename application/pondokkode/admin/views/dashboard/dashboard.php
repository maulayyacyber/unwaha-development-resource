<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-bar-chart-o"></i>Statistik Pengunjung
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                            <div class="row">

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="glyphicon glyphicon-calendar"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php print $today_visit ?>
							</div>
							<div class="desc">
								 Hari ini
							</div>
						</div>
            <a class="more" href="#hari" onclick="javascript:GetToday('<?php print date("Y-m-d") ?>')">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="glyphicon glyphicon-calendar"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php print $week_visit ?>
							</div>
							<div class="desc">
								Minggu ini
							</div>
						</div>
            <a class="more" href="#minggu" onclick="javascript:GetWeek(<?php print date("Y-m-d") ?>, <?php print date( "Y-m-d", strtotime( date("Y-m-d"). "-7 day" ) ) ?>)">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="glyphicon glyphicon-calendar"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php print $month_visit ?>
							</div>
							<div class="desc">
								Bulan ini
							</div>
						</div>
            <a class="more" href="#bulan" onclick="javascript:GetMonth(<?php print date("Y-m-d") ?>)">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="glyphicon glyphicon-calendar"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php print $year_visit ?>
							</div>
							<div class="desc">
								Tahun ini
							</div>
						</div>
            <a class="more" href="#tahun" onclick="javascript:GetAllTime()">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
        </div>
        </div>
        </div>
        <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-bar-chart-o"></i>Grafik Pengunjung
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="javascript:;" class="remove"></a>
                                </div>
                        </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                            <div class="btn-group">
                                    <button type="button" id="hari" onclick="javascript:GetToday('<?php print date("Y-m-d") ?>')" class="btn btn-default"> Hari ini</button>
                                    <button type="button" id="minggu" onclick="javascript:GetWeek(<?php print date("Y-m-d") ?>, <?php print date( "Y-m-d", strtotime( date("Y-m-d"). "-7 day" ) ) ?>)" class="btn btn-default"> Minggu ini</button>
                                    <button type="button" id="bulan" onclick="javascript:GetMonth(<?php print date("Y-m-d") ?>)" class="btn btn-default"> Bulan ini</button>
                                    <button type="button" id="tahun" onclick="javascript:GetAllTime()" class="btn btn-default"> Semua</button>
                            </div>
                            <div id="container"></div>
        </div>
        </div>
    </div>
</div>
