<?php 
namespace JonatanUribe\pruebabandit;

use JonatanUribe\pruebabandit\Client;

class Form
{
	var $form = "";
	
	public function __construct()
	{
		$client = new Client();
		$banks = $client->getListBanks();
		print_r($banks);
	    $this->form .= "
		    <form method='POST' action='https://sandbox.gateway.payulatam.com/ppp-web-gateway/' name='frmData'>
			<div>
			<label for='txtTipoDoc'>Tipo Documento</label>
			<select name='documentType'>
			    <option value='CC'>Cédula de ciudanía</option>
				<option value='TI'>Tarjeta de identidad</option>
				<option value='CE'>Cédula de extranjería</option>
				<option value='PPN'>Pasaporte</option>
				<option value='NIT'>Número de identificación tributaria</option>
				<option value='SSN'>Social Security Number</option>
			</select>
			</div>
			<div>
			<label for='document'>Documento</label>
			<input name='document' />
			</div>
			<div>
			<label for='firstName'>Nombres</label>
			<input name='firstName' />
			</div>
			<div>
			<label for='lastName'>Apellidos</label>
			<input name='lastName' />
			</div>
			<div>
			<label for='company'>Compañia</label>
			<input name='company' />
			</div>
			<div>
			<label for='emailAddress'>Correo electrónico</label>
			<input name='emailAddress' />
			</div>
			<div>
			<label for='address'>Dirección postal</label>
			<input name='address' />
			</div>
			<div>
			<label for='city'>Ciudad</label>
			<input name='city' />
			</div>
			<div>
			<label for='province'>Departamento</label>
			<input name='province' />
			</div>
			<div>
			<label for='country'>País</label>
			<input name='country' />
			</div>
			<div>
			<label for='phone'>Teléfono</label>
			<input name='phone' />
			</div>
			<div>
			<label for='mobile'>Celular</label>
			<input name='mobile' />
			</div>
			<div>
			<input name='Submit' type='submit' value='Enviar' />
			</div>
			</form>
		";
	}
	
	public function getForm()
	{
		return $this->form;
	}
}

?>

