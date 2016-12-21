<?php 
namespace JonatanUribe\pruebabandit;

class Form
{
	public $form = "";
	
	public function __construct()
	{
	    $form .= "
		    <form name='frmData' action='' method='POST'>
			<input name='txtTipoDoc' />
			<input name='txtDoc' />
			</form>
		";
	}
	
	public getForm()
	{
		return $this->form;
	}
}

?>

