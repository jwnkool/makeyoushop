<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('reports') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('reports') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
                    <div class="col-xs-12">
                        <h3><?php echo lang('best_sellers');?></h3>
                    </div>
                    <div class="col-xs-2 pull-right">
                        <form class="form-inline pull-left">
                            <input class="form-control" type="text"  id="best_sellers_start" placeholder="<?php echo lang('from');?>"/>
                            <input type="hidden" name="best_sellers_start" id="best_sellers_start_alt" /> 
                    </div>
                    <div class="col-xs-2 pull-right">
                            <input class="form-control" type="text" id="best_sellers_end" placeholder="<?php echo lang('to');?>"/>
                            <input type="hidden" name="best_sellers_end" id="best_sellers_end_alt" /> 
                            
                    </div>
                            <input class="btn btn-success pull-right" type="button" value="<?php echo lang('get_best_sellers');?>" onclick="get_best_sellers()"/>
                        </form>
                        
                    <div class="row">
                        <div class="col-xs-12" id="best_sellers"></div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12">
                            <h3><?php echo lang('sales');?></h3>
                        </div>
                        <div class="col-xs-12">
                            <form class="form-inline pull-right">
                                <select name="year" id="sales_year" class="form-control">
                                    <?php foreach($years as $y):?>
                                        <option value="<?php echo $y;?>"><?php echo $y;?></option>
                                    <?php endforeach;?>
                                </select>
                                <input class="btn btn-primary" type="button" value="<?php echo lang('get_monthly_sales');?>" onclick="get_monthly_sales()"/>
                            </form>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12" id="sales_container"></div>
                    </div>


					</div><!-- /.row -->
             </section>
             
<script type="text/javascript">

$(document).ready(function(){
	get_best_sellers();
	get_monthly_sales();
	$('input:button').button();
	$('#best_sellers_start').datepicker({ dateFormat: 'mm-dd-yy', altField: '#best_sellers_start_alt', altFormat: 'yy-mm-dd' });
	$('#best_sellers_end').datepicker({ dateFormat: 'mm-dd-yy', altField: '#best_sellers_end_alt', altFormat: 'yy-mm-dd' });
});

function get_best_sellers()
{
	show_animation();
	$.post('<?php echo site_url('backend_reports/best_sellers');?>',{start:$('#best_sellers_start_alt').val(), end:$('#best_sellers_end_alt').val()}, function(data){
		$('#best_sellers').html(data);
		setTimeout('hide_animation()', 500);
	});
}

function get_monthly_sales()
{
	show_animation();
	$.post('<?php echo site_url('backend_reports/sales');?>',{year:$('#sales_year').val()}, function(data){
		$('#sales_container').html(data);
		setTimeout('hide_animation()', 500);
	});
}

function show_animation()
{
	$('#saving_container').css('display', 'block');
	$('#saving').css('opacity', '.8');
}

function hide_animation()
{
	$('#saving_container').fadeOut();
}

</script>

<div id="saving_container" style="display:none;">
	<div id="saving" style="background-color:#000; position:fixed; width:100%; height:100%; top:0px; left:0px;z-index:100000"></div>
	<img id="saving_animation" src="<?php echo base_url('assets/admin_theme/img/storing_animation.gif');?>" alt="saving" style="z-index:100001; margin-left:-32px; margin-top:-32px; position:fixed; left:50%; top:50%"/>
	<div id="saving_text" style="text-align:center; width:100%; position:fixed; left:0px; top:50%; margin-top:40px; color:#fff; z-index:100001"><?php echo lang('loading');?></div>
</div>