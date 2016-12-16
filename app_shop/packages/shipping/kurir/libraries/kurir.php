<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kurir
{
	var $CI;
	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->lang->load('kurir');
	}
	
	function rates()
	{
		
		$settings	= $this->CI->Settings_model->get_settings('kurir');
		
		if($settings['enabled'] && $settings['enabled'] > 0)
		{
			return array(''.$settings['setting_desc'].'' => $settings['rates']);
		}
		else
		{
			return array();
		}	
	}
	
		
	function form($post	= false)
	{
		$this->CI->load->helper('form');
		
		//this same function processes the form
		if(!$post)
		{
			$settings	= $this->CI->Settings_model->get_settings('kurir');
		}
		ob_start();
		?>

		<label><?php echo lang('enabled');?></label>
		<select name="enabled" class="form-control">
			<option value="1"<?php echo((bool)$settings['enabled'])?' selected="selected"':'';?>><?php echo lang('enabled');?></option>
			<!--option value="0"<?php echo((bool)$settings['enabled'])?'':' selected="selected"';?>><?php echo lang('disabled');?></option-->
		</select>
		<?php
		$form =ob_get_contents();
		ob_end_clean();

		return $form;
	}
	function check()
	{	
		$error	= false;
		
		if(!is_numeric($_POST['enabled']))
		{
			$error	.= '<div>'.lang('val_err').'</div>';
		}		
		
		//count the errors
		if($error)
		{
			return $error;
		}
		else
		{
			//we save the settings if it gets here
			$this->CI->Settings_model->save_settings('kurir', array('enabled'=>$_POST['enabled']));
			
			return false;
		}
	}
}