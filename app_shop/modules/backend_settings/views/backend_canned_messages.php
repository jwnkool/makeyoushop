<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('canned_messages') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('canned_messages') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
                    <div class="button_set pull-right">
                        <a class="btn btn-warning" href="<?php echo site_url('backend_settings/canned_message_form/');?>"><i class="fa fa-envelope"></i> <?php echo lang('add_canned_message');?></a>
                    </div>          
                    <br /><br />
                    <?php if(count($canned_messages) > 0): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo lang('message_name');?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($canned_messages as $message): ?>
                            <tr class="gc_row">
                                <td><?php echo $message['name']; ?></td>
                                <td>
                                    <span class="btn-group pull-right">
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('backend_settings/canned_message_form/'.$message['id']);?>"><i class="fa fa-envelope-o"></i> <?php echo lang('edit');?></a>
                                        <?php if($message['deletable'] == 1) : ?>   
                                            <a class="btn btn-sm btn-danger" href="<?php echo site_url('backend_settings/delete_message/'.$message['id']);?>" onclick="return areyousure();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                                        <?php endif; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>

					</div><!-- /.row -->
             </section>
             
<script type="text/javascript">
function areyousure()
{
    return confirm('<?php echo lang('confirm_are_you_sure');?>');
}
</script>