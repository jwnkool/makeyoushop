 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo lang('check_ongkir');?></h2>
        <ol class="breadcrumb">                 
          <li><a href="#"><?php echo lang('form_checkout');?></a></li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  
 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">

			<?php if (validation_errors()):?>
    		<div class="container">
              <div class="row">
                <div class="col-md-11"><br />
                    <div class="alert alert-info alert-dismissable">
                        <i class="fa fa-info"></i> <a class="close" data-dismiss="alert">×</a>
                        <?php echo validation_errors();?>
                    </div>
                </div>
              </div>
            </div>
			<?php endif;?>


		<center><h3><?php echo lang('shipping_courier');?></h3></center><hr />

		<div class="row">
			<div class="col-sm-4">
				<?php echo lang('province_shipping');?><br/>
				<select id="desprovince" class="form-control">
					<option>Loading</option>
				</select>
            </div>
			<div class="col-sm-4">
            	<?php echo lang('city_shipping');?><br/>
				<select name="descity" id="descity" class="form-control">
					<option>Loading</option>
				</select> 
			</div>
			<div class="col-sm-2">
				<?php echo lang('courier_services');?><br/>
				<select name="service" id="service" class="form-control">
					<option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                    <option value="pos">POS</option>
				</select> 
            </div>
            
			<input type="hidden" name="weight" style="width:150px" id="berat" type="number" value="1000">
			
			<div class="col-sm-2">
				<br/>
				<button class="btn btn-info" onclick="cekHarga()" id="cek_paket"><?php echo lang('check_ongkir');?></button>
			</div>
			</form>
            
</div>
<hr>

		<div class="col-sm-12">
        	<div class="table-responsive">	
            
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="button-blue">
                        <th><?php echo lang('courier');?></th>
                        <th><?php echo lang('services');?></th>
                        <th><?php echo lang('desc_services');?></th>
                        <th><?php echo lang('cost');?></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="resultsbox"></tbody> 
                </table>
             </div>
		</div>
        
   
                </div>
			</div>
		</div>
	</div>
</section>
                       
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	loadProvinsi('#desprovince');
	
	$('#desprovince').change(function(){
		$('#descity').show();
		$('#cek_paket').show();
		var idprovince = $('#desprovince').val();
		loadCity(idprovince,'#descity')
		
	});

});

function loadProvinsi(id){
	show_animation();
	$('#descity').hide();
	$('#cek_paket').hide();
	$(id).html('loading...');
	$.ajax({
		url:'<?php echo site_url('checkout/showprovince');?>',
		dataType:'json',
		cache:false,
		success:function(response){
			$(id).html('');
			province = '';
				$.each(response['rajaongkir']['results'], function(i,n){
					province = '<option value="'+n['province_id']+'">'+n['province']+'</option>';
					province = province + '';
					$(id).append(province);
					setTimeout('hide_animation()', 500);
				});
		},
		error:function(){
			$(id).html('ERROR');
		}
	});
}
function loadCity(idprovince,id){
	show_animation();
	$.ajax({
		url:'<?php echo site_url('checkout/showcity');?>',
		dataType:'json',
		cache:false,
		data:{province:idprovince},
		success:function(response){
			$(id).html('');
			city = '';
				$.each(response['rajaongkir']['results'], function(i,n){
					city = '<option value="'+n['city_id']+', '+n['city_name']+' ('+n['type']+')">'+n['city_name']+'&nbsp;('+n['type']+')</option>';
					city = city + '';
					$(id).append(city);
					setTimeout('hide_animation()', 500);
				});
		},
		error:function(){
			$(id).html('ERROR');
		}
	});
}
function cekHarga(){
	show_animation();
	var destination = $('#descity').val();
	var weight = $('#berat').val();
	var courier = $('#service').val();
	$.ajax({
		url:'<?php echo site_url('checkout/cost');?>',
		data:{destination:destination,weight:weight,courier:courier},
		success:function(response){
			$('#resultsbox').html(response);
			setTimeout('hide_animation()', 500);
		},
		error:function(){
			$('#resultsbox').html('ERROR');
		}
	});
}
</script>

<script>
	function toggle_shipping(key)
	{
		var check = $('#'+key);
		if(!check.attr('checked'))
		{
			check.attr('checked', true);
		}
	}
</script> 	

<script>
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
	<img id="saving_animation" src="<?php echo base_url('assets/img/storing_animation.gif');?>" style="z-index:100001; margin-left:-32px; margin-top:-32px; position:fixed; left:50%; top:50%"/>
</div>
