<?php 
namespace JonatanUribe\pruebabandit;

use JonatanUribe\pruebabandit\Client;
use JonatanUribe\pruebabandit\Person;
use JonatanUribe\pruebabandit\PSETransactionRequest;
use JonatanUribe\pruebabandit\Session;

class Form
{
	var $form = '';
	var $session = '';
	var $url = '';
	public function __construct($url = '', $post = '')
	{
		$this->url = $url;
		if(isset($post['Submit'])) {
			if($post['Submit'] == 'Crear' || $post['Submit'] == 'Verificar') {
				$this->session = new Session();
				if(isset($post['document'])) {
					$document = addslashes($post['document']); 
					$documentType = addslashes($post['documentType']); 
					$firstName = addslashes($post['firstName']); 
					$lastName = addslashes($post['lastName']); 
					$company = addslashes($post['company']); 
					$emailAddress = addslashes($post['emailAddress']); 
					$address = addslashes($post['address']); 
					$city = addslashes($post['city']); 
					$province = addslashes($post['province']); 
					$country = addslashes($post['country']); 
					$phone = addslashes($post['phone']); 
					$mobile = addslashes($post['mobile']);
					$person = new Person($document, $documentType, $firstName, $lastName, $company, $emailAddress, $city, $province, $country = 'CO', $phone, $mobile);
					$this->session->setSession('person', $person);
				} else {
					$person = $this->session->getSession('person');
				}
				if($person->document != '')
				{
					if($post['Submit'] == 'Crear' ) {
						$transactionInformation = '';
					}
					else
					{
						$transactionInformation = $this->session->getSession('transactionInformation');
					}
					if($transactionInformation == '') {
						//crear la transacción
						$bankCode = addslashes($post['bank']);
						$bankInterface = '0';
						$returnURL = $url; 
						$reference = '000002'; 
						$description = 'Prueba'; 
						$language = 'ES'; 
						$currency = 'COP'; 
						$totalAmount = '10000'; 
						$taxAmount = '0'; 
						$devolutionBase = '0'; 
						$tipAmount = '0'; 
						$payer = $person; 
						$buyer = null; 
						$shipping = null; 
						$ipAddress = '50.63.202.36'; 
						$additionalData = null;
						$transaction = new PSETransactionRequest($bankCode, $bankInterface, $returnURL, $reference, $description, $language, $currency, $totalAmount, $taxAmount, $devolutionBase, $tipAmount, $payer, $buyer, $shipping, $ipAddress, $additionalData);
						$client = new Client();
						$response = $client->makeTransaction($transaction);
					} else 
					{
						$client = new Client();
						$response = $client->setTransactionInfo($transactionInformation->transactionID);
					}
					$transaction = $this->session->getSession('transaction');
					$this->setFormShow($person, $response, $transaction);
				} else
				{
					$this->setFormPay();
				}
			}
			else 
			{
				
			}
		} else {
			$this->setFormPay();
		}
	}
	
	public function setFormPay()
	{
		$client = new Client();
		$banks = $client->getListBanks();
		$selectListBanks = "<select name='bank'>";
		foreach ($banks->getBankListResult->item as $bank) {
			if(trim($bank->bankName) != '')
			{
				$selectListBanks .= "<option value='{$bank->bankCode}'>{$bank->bankName}</option>";
			}
        }
		$selectListBanks .= "</select>";
		$this->form .= "
		    <form method='POST' action='#' name='frmData'>
			<div>
			{$selectListBanks}
			</div>
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
			<input name='country' value='CO' readonly />
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
			<input name='Submit' type='submit' value='Crear' />
			</div>
			</form>
			
		";
	}
	
	public function setFormShow($person, $transactionInformation, $transaction)
	{
		$this->form .= "
		    <form method='POST' action='#' name='frmInfo'>
			<div>
			<h3>Documento</h3>
			<h4>{$person->document}</h4>
			</div>
			<div>
			<h3>Nombre</h3>
			<h4>{$person->firstName} {$person->lastName}</h4>
			</div>
			<div>
			<h3>Id Transacción</h3>
			<h4>{$transactionInformation->transactionID}</h4>
			</div>
			<div>
			<h3>Fecha</h3>
			<h4>{$transactionInformation->requestDate}</h4>
			</div>
			<div>
			<h3>Estado</h3>
			<h4>{$transactionInformation->responseReasonText}</h4>
			</div>
			<div>
			<h3>URL</h3>
			<h4><a target='_blank' href='{$transaction->bankURL}'>Ir al banco<a></h4>
			</div>
			<div>
			<input name='Submit' type='submit' value='Verificar' />
			</div>
			</form>
			<br>
			<a href='{$this->url}'>Página principal</a>
		";
	}
	
	public function getForm()
	{
		return $this->form;
	}
	
	
}

?>

