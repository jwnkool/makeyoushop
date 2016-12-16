<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_customers');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('address') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('address') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<script type="text/javascript">
                    function areyousure()
                    {
                        return confirm('<?php echo lang('confirm_delete_address');?>');
                    }
                    </script>

                    <a class="btn btn-success" style="float:right;"href="<?php echo site_url('backend_customers/address_form/'.$customer->id);?>"><i class="fa fa-compass"></i> <?php echo lang('add_new_address');?></a>
                    <br /><br />
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo lang('name');?></th>
                                <th><?php echo lang('contact');?></th>
                                <th><?php echo lang('address');?></th>
                                <th><?php echo lang('locality');?></th>
                                <th><?php echo lang('country');?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php echo (count($addresses) < 1)?'<tr><td style="text-align:center;" colspan="6">'.lang('no_addresses').'</td></tr>':''?>
                    <?php foreach ($addresses as $address):
                            $f = $address['field_data'];
                    ?>
                            <tr>
                                <td>
                                    <?php echo $f['lastname']; ?>, <?php echo $f['firstname']; ?>
                                    <?php echo (!empty($f['company']))?'<br/>'.$f['company']:'';?>
                                </td>
                                
                                <td>
                                    <?php echo  $f['phone']; ?><br/>
                                    <a href="mailto:<?php echo  $f['email'];?>"><?php echo  $f['email']; ?></a>
                                </td>
                                
                                <td>
                                    <?php echo $f['address1'];?>
                                    <?php echo (!empty($f['address2']))?'<br/>'.$f['address2']:'';?>
                                </td>
                                
                                <td>
                                    <?php echo $f['city'];?>, <?php echo $f['zone'];?> <?php echo $f['zip'];?> 
                                </td>
                                
                                <td><?php echo $f['country'];?></td>
                                
                                <td>
                                    <div class="btn-group" style="float:right">
                                    
                                        <a class="btn btn-info" href="<?php echo site_url('backend_customers/address_form/'.$customer->id.'/'.$address['id']);?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>
                                        
                                        <a class="btn btn-danger" href="<?php echo site_url('backend_customers/delete_address/'.$customer->id.'/'.$address['id']);?>" onclick="return areyousure();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                                    </div>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                        </tbody>
                    </table>
					</div><!-- /.row -->
             </section>