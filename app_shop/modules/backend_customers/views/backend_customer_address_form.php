<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_customers');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('address_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('address_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
					<?php
                    $f_company	= array('name'=>'company','class'=>'form-control', 'value'=> set_value('company',$company));
                    $f_address1	= array('name'=>'address1', 'class'=>'form-control','value'=>set_value('address1',$address1));
                    $f_address2	= array('name'=>'address2', 'class'=>'form-control','value'=> set_value('address2',$address2));
                    $f_first	= array('name'=>'firstname', 'class'=>'form-control','value'=> set_value('firstname',$firstname));
                    $f_last		= array('name'=>'lastname', 'class'=>'form-control','value'=> set_value('lastname',$lastname));
                    $f_email	= array('name'=>'email', 'class'=>'form-control','value'=>set_value('email',$email));
                    $f_phone	= array('name'=>'phone', 'class'=>'form-control','value'=> set_value('phone',$phone));
                    $f_city		= array('name'=>'city','class'=>'form-control', 'value'=>set_value('city',$city));
                    $f_zip		= array('maxlength'=>'10', 'class'=>'form-control', 'name'=>'zip', 'value'=> set_value('zip',$zip));
                    ?>
                    <?php echo form_open('backend_customers/address_form/'.$customer_id.'/'.$id);?>
	
                         <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                <label><?php echo lang('company');?></label>
                                <?php echo form_input($f_company);?>
                            	</div>
                        	</div>
                        </div>
	
                         <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label><?php echo lang('firstname');?></label>
                                    <?php echo form_input($f_first);?>
                                </div>
                                <div class="col-xs-6">
                                    <label><?php echo lang('lastname');?></label>
                                    <?php echo form_input($f_last);?>
                                </div>
                            </div>
                        </div>
                        
                         <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label><?php echo lang('email');?></label>
                                    <?php echo form_input($f_email);?>
                                </div>
                                <div class="col-xs-6">
                                    <label><?php echo lang('phone');?></label>
                                    <?php echo form_input($f_phone);?>
                                </div>
                            </div>
						</div>
	
                         <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                <label><?php echo lang('country');?></label>
                                <?php echo form_dropdown('country_id', $countries_menu, set_value('country_id', $country_id), 'id="f_country_id" class="form-control"');?>
                            </div>
                        	</div>
                        </div>

                         <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                <label><?php echo lang('address');?></label>
                                <?php echo form_input($f_address1);?>
                            	</div>
                            </div>
                        </div>

                         <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
								<?php echo form_input($f_address2);?>
                                </div>
                            </div>
						</div>
	
                         <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label><?php echo lang('city');?></label>
                                    <?php echo form_input($f_city);?>
                                </div>
                                <div class="col-xs-4">
                                    <label><?php echo lang('state');?></label>
                                    <?php echo form_dropdown('zone_id', $zones_menu, set_value('zone_id', $zone_id), 'id="f_zone_id" class="form-control"');?>
                                </div>
                                <div class="col-xs-4">
                                    <label><?php echo lang('zip');?></label>
                                    <?php echo form_input($f_zip);?>
                                </div>
                            </div>
                            <hr />
                            <input class="btn btn-primary" type="submit" value="<?php echo lang('save');?>"/>
                        </div>
                        
                        <script type="text/javascript">
                        $(document).ready(function(){
                            $('#f_country_id').change(function(){
                                $.post('<?php echo site_url('backend_locations/get_zone_menu');?>',{id:$('#f_country_id').val()}, function(data) {
                                  $('#f_zone_id').html(data);
                                });
                        
                            });
                        });
                        </script>
                        
                    </form>
					</div><!-- /.row -->
             </section>