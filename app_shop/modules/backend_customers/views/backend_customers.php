<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('customers') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('customers') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
						<script type="text/javascript">
							function areyousure()
							{
								return confirm('<?php echo lang('confirm_delete_customer');?>');
							}
                        </script>
                        <div class="pull-right">
                            <!--a class="btn" href="<?php echo site_url('backend_customers/export_xml');?>"><i class="icon-download"></i> <?php echo lang('xml_download');?></a>
                            <a class="btn" href="<?php echo site_url('backend_customers/get_subscriber_list');?>"><i class="icon-download"></i> <?php echo lang('subscriber_download');?></a-->
                            <a class="btn btn-warning" href="<?php echo site_url('backend_customers/form'); ?>"><i class="fa fa-user"></i> <?php echo lang('add_new_customer');?></a>
                            
                        </div>
                        <br /><br />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    
                                    <?php
                                    if($by=='ASC')
                                    {
                                        $by='DESC';
                                    }
                                    else
                                    {
                                        $by='ASC';
                                    }
                                    ?>
                                    
                                    <th><a href="<?php echo site_url('backend_customers/index/lastname/');?>/<?php echo ($field == 'lastname')?$by:'';?>"><?php echo lang('lastname');?>
                                        <?php if($field == 'lastname'){ echo ($by == 'ASC')?'<i class="fa fa-chevron-up"></i>':'<i class="fa fa-chevron-down"></i>';} ?> </a></th>
                                    
                                    <th><a href="<?php echo site_url('backend_customers/index/firstname/');?>/<?php echo ($field == 'firstname')?$by:'';?>"><?php echo lang('firstname');?>
                                        <?php if($field == 'firstname'){ echo ($by == 'ASC')?'<i class="fa fa-chevron-up"></i>':'<i class="fa fa-chevron-down"></i>';} ?></a></th>
                                    
                                    <th><a href="<?php echo site_url('backend_customers/index/email/');?>/<?php echo ($field == 'email')?$by:'';?>"><?php echo lang('email');?>
                                        <?php if($field == 'email'){ echo ($by == 'ASC')?'<i class="fa fa-chevron-up"></i>':'<i class="fa fa-chevron-down"></i>';} ?></a></th>
                                    <th><?php echo lang('active');?></th>
                                    <th></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $page_links	= $this->pagination->create_links();
                                
                                if($page_links != ''):?>
                                <tr><td colspan="5" style="text-align:center"><?php echo $page_links;?></td></tr>
                                <?php endif;?>
                                <?php echo (count($customers) < 1)?'<tr><td style="text-align:center;" colspan="5">'.lang('no_customers').'</td></tr>':''?>
                        <?php foreach ($customers as $customer):?>
                                <tr>
                                    <?php /*<td style="width:16px;"><?php echo  $customer->id; ?></td>*/?>
                                    <td><?php echo  $customer->lastname; ?></td>
                                    <td><?php echo  $customer->firstname; ?></td>
                                    <td><a href="mailto:<?php echo  $customer->email;?>"><?php echo  $customer->email; ?></a></td>
                                    <td>
                                        <?php if($customer->active == 1)
                                        {
                                            echo 'Yes';
                                        }
                                        else
                                        {
                                            echo 'No';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="btn-group" style="float:right">
                                            <a class="btn btn-primary btn-md" href="<?php echo site_url('backend_customers/form/'.$customer->id); ?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>
                                            
                                            <a class="btn btn-info btn-md" href="<?php echo site_url('backend_customers/addresses/'.$customer->id); ?>"><i class="fa fa-home"></i> <?php echo lang('addresses');?></a>
                                            
                                            <a class="btn btn-danger btn-md" href="<?php echo site_url('backend_customers/delete/'.$customer->id); ?>" onclick="return areyousure();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                                        </div>
                                    </td>
                                </tr>
                        <?php endforeach;
                                if($page_links != ''):?>
                                <tr><td colspan="5" style="text-align:center"><?php echo $page_links;?></td></tr>
                                <?php endif;?>
                            </tbody>
                        </table>

					</div><!-- /.row -->
             </section>