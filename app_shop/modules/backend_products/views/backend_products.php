<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('products') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('products') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php
                    //set "code" for searches
                    if(!$code)
                    {
                        $code = '';
                    }
                    else
                    {
                        $code = '/'.$code;
                    }
                    function sort_url($lang, $by, $sort, $sorder, $code, $admin_folder)
                    {
                        if ($sort == $by)
                        {
                            if ($sorder == 'asc')
                            {
                                $sort	= 'desc';
                                $icon	= ' <i class="fa fa-chevron-up"></i>';
                            }
                            else
                            {
                                $sort	= 'asc';
                                $icon	= ' <i class="fa fa-chevron-down"></i>';
                            }
                        }
                        else
                        {
                            $sort	= 'asc';
                            $icon	= '';
                        }
                            
                    
                        $return = site_url('backend_products/index/'.$by.'/'.$sort.'/'.$code);
                        
                        echo '<a href="'.$return.'">'.lang($lang).$icon.'</a>';
                    
                    }
                    
                    if(!empty($term)):
                        $term = json_decode($term);
                        if(!empty($term->term) || !empty($term->category_id)):?>
                            <div class="alert alert-info">
                                <?php echo sprintf(lang('search_returned'), intval($total));?>
                            </div>
                        <?php endif;?>
                    <?php endif;?>
                    
                    <script type="text/javascript">
                    function areyousure()
                    {
                        return confirm('<?php echo lang('confirm_delete_product');?>');
                    }
                    </script>
        
			<div class="col-xs-12"> 
                       
			<?php echo $this->pagination->create_links();?>	&nbsp;
        
				<?php echo form_open('backend_products/index', 'class="form-inline" style="float:right"');?>
                
                	<div class="input-group input-group-sm">
                            <div class="col-xs-4">
								<?php
                                
                                function list_categories($id, $categories, $sub='') {
        
                                    foreach ($categories[$id] as $cat):?>
                                        <option class="form-control" value="<?php echo $cat->id;?>"><?php echo  $sub.$cat->name; ?></option>
                                    <?php
                                    if (isset($categories[$cat->id]) && sizeof($categories[$cat->id]) > 0)
                                    {
                                        $sub2 = str_replace('&rarr;&nbsp;', '&nbsp;', $sub);
                                        $sub2 .=  '&nbsp;&nbsp;&nbsp;&rarr;&nbsp;';
                                        list_categories($cat->id, $categories, $sub2);
                                    }
                                    endforeach;
                                }
                                
                                if(!empty($categories))
                                {
                                    echo '<select name="category_id" class="form-control">';
                                    echo '<option value="">'.lang('filter_by_category').'</option>';
                                    list_categories(0, $categories);
                                    echo '</select>';
                                    
                                }?>
                            </div>
                        
                          <div class="col-xs-4">
                             <input type="text" class="form-control" name="term" placeholder="<?php echo lang('search_term');?>" /> 
                          </div>
                          <div class="col-xs-4">
                             <span class="input-group-btn">
                                  	<button class="btn btn-primary" name="submit" value="search"><i class="fa fa-search-plus"></i> <?php echo lang('search')?></button>
									<a class="btn btn-success" href="<?php echo site_url('backend_products/index');?>"><i class="fa fa-spinner"></i> Reset</a>
                             </span>
                          </div>
				</form>
             </div><!-- /input-group -->
        <hr />
		</div>
        
		<div class="col-xs-12"> 
			<?php echo form_open('backend_products/bulk_save', array('id'=>'bulk_form'));?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo sort_url('sku', 'sku', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
                            <th><?php echo sort_url('name', 'name', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
                            <th><?php echo sort_url('price', 'price', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
                            <th><?php echo sort_url('saleprice', 'saleprice', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
                            <th><?php echo sort_url('quantity', 'quantity', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
                            <th><?php echo sort_url('enabled', 'enabled', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
                            <th>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-sm" href="#"><i class="fa fa-save"></i> <?php echo lang('bulk_save');?></button>
                                    <a class="btn btn-warning btn-sm" href="<?php echo site_url('backend_products/form');?>"><i class="fa fa-truck"></i> <?php echo lang('add_new_product');?></a>
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php echo (count($products) < 1)?'<tr><td style="text-align:center;" colspan="7">'.lang('no_products').'</td></tr>':''?>
                <?php foreach ($products as $product):?>
                        <tr>
                            <td><?php echo form_input(array('name'=>'product['.$product->id.'][sku]','value'=>form_decode($product->sku), 'class'=>'form-control'));?></td>
                            <td><?php echo form_input(array('name'=>'product['.$product->id.'][name]','value'=>form_decode($product->name), 'class'=>'form-control'));?></td>
                            <td><?php echo form_input(array('name'=>'product['.$product->id.'][price]', 'value'=>set_value('price', $product->price), 'class'=>'form-control'));?></td>
                            <td><?php echo form_input(array('name'=>'product['.$product->id.'][saleprice]', 'value'=>set_value('saleprice', $product->saleprice), 'class'=>'form-control'));?></td>
                            <td><?php echo ((bool)$product->track_stock)?form_input(array('name'=>'product['.$product->id.'][quantity]', 'value'=>set_value('quantity', $product->quantity), 'class'=>'form-control')):'N/A';?></td>
                            <td>
                                <?php
                                    $options = array(
                                          '1'	=> lang('enabled'),
                                          '0'	=> lang('disabled')
                                        );
            
                                    echo form_dropdown('product['.$product->id.'][enabled]', $options, set_value('enabled',$product->enabled), 'class="form-control"');
                                ?>
                            </td>
                            <td>
                                <span class="btn-group pull-right">
                                    <a class="btn btn-info btn-sm" href="<?php echo  site_url('backend_products/form/'.$product->id);?>"><i class="fa fa-edit"></i>  <?php echo lang('edit');?></a>
                                    <a class="btn btn-info btn-sm" href="<?php echo  site_url('backend_products/form/'.$product->id.'/1');?>"><i class="fa fa-paste"></i> <?php echo lang('copy');?></a>
                                    <a class="btn btn-danger btn-sm" href="<?php echo  site_url('backend_products/delete/'.$product->id);?>" onclick="return areyousure();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                                </span>
                            </td>
                        </tr>
                <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
		</div>
					</div><!-- /.row -->
             </section>