<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');

class Tokens{

	Public function deftoken($id){
		$data = array();

		switch ($id) {
			case '1':
    			$data['ruta'] = "https://api.pse.pe/api/v1/782529ec6e184f9faf631b905df687ba6dae035978a643d1912dee909929a80e";
    			$data['token'] = "eyJhbGciOiJIUzI1NiJ9.IjhhNTc3N2RjZjU5ZTRjZWI5Zjg2YzFlZmMyNTgyYjZlZTRkZTQ5ZTA5YWNiNDZiZmFlMzFhMWUxNTU5OTAwOWMi.TSxz31kEMyKaRTZWUrnHq9rVQMj15853_sac7aGXIBU";
    			break;
    		case '2'://SUCURSAL DEMO
    			$data['ruta'] = "https://api.pse.pe/api/v1/782529ec6e184f9faf631b905df687ba6dae035978a643d1912dee909929a80e";
    			$data['token'] = "eyJhbGciOiJIUzI1NiJ9.IjhhNTc3N2RjZjU5ZTRjZWI5Zjg2YzFlZmMyNTgyYjZlZTRkZTQ5ZTA5YWNiNDZiZmFlMzFhMWUxNTU5OTAwOWMi.TSxz31kEMyKaRTZWUrnHq9rVQMj15853_sac7aGXIBU";
    			break;
			case '3'://SUCURSAL DEMO
				$data['ruta'] = "https://api.pse.pe/api/v1/782529ec6e184f9faf631b905df687ba6dae035978a643d1912dee909929a80e";
    			$data['token'] = "eyJhbGciOiJIUzI1NiJ9.IjhhNTc3N2RjZjU5ZTRjZWI5Zjg2YzFlZmMyNTgyYjZlZTRkZTQ5ZTA5YWNiNDZiZmFlMzFhMWUxNTU5OTAwOWMi.TSxz31kEMyKaRTZWUrnHq9rVQMj15853_sac7aGXIBU";
				break;
      
			case '4'://SUCURSAL DEMO
				$data['ruta'] = "https://api.pse.pe/api/v1/782529ec6e184f9faf631b905df687ba6dae035978a643d1912dee909929a80e";
    			$data['token'] = "eyJhbGciOiJIUzI1NiJ9.IjhhNTc3N2RjZjU5ZTRjZWI5Zjg2YzFlZmMyNTgyYjZlZTRkZTQ5ZTA5YWNiNDZiZmFlMzFhMWUxNTU5OTAwOWMi.TSxz31kEMyKaRTZWUrnHq9rVQMj15853_sac7aGXIBU";
				break;

			case '5'://SUCURSAL DEMO
				$data['ruta'] = "https://api.pse.pe/api/v1/782529ec6e184f9faf631b905df687ba6dae035978a643d1912dee909929a80e";
    			$data['token'] = "eyJhbGciOiJIUzI1NiJ9.IjhhNTc3N2RjZjU5ZTRjZWI5Zjg2YzFlZmMyNTgyYjZlZTRkZTQ5ZTA5YWNiNDZiZmFlMzFhMWUxNTU5OTAwOWMi.TSxz31kEMyKaRTZWUrnHq9rVQMj15853_sac7aGXIBU";
				break;

            case '6'://SUCURSAL DEMO
				$data['ruta'] = "https://api.pse.pe/api/v1/782529ec6e184f9faf631b905df687ba6dae035978a643d1912dee909929a80e";
    			$data['token'] = "eyJhbGciOiJIUzI1NiJ9.IjhhNTc3N2RjZjU5ZTRjZWI5Zjg2YzFlZmMyNTgyYjZlZTRkZTQ5ZTA5YWNiNDZiZmFlMzFhMWUxNTU5OTAwOWMi.TSxz31kEMyKaRTZWUrnHq9rVQMj15853_sac7aGXIBU";
				break;

			case '7'://SUCURSAL DEMO
				$data['ruta'] = "https://api.pse.pe/api/v1/782529ec6e184f9faf631b905df687ba6dae035978a643d1912dee909929a80e";
    			$data['token'] = "eyJhbGciOiJIUzI1NiJ9.IjhhNTc3N2RjZjU5ZTRjZWI5Zjg2YzFlZmMyNTgyYjZlZTRkZTQ5ZTA5YWNiNDZiZmFlMzFhMWUxNTU5OTAwOWMi.TSxz31kEMyKaRTZWUrnHq9rVQMj15853_sac7aGXIBU";
				break;

			default:
				$data['ruta'] = "";
    			$data['token'] = "";
				break;
		}
		
		return $data;
	}
}
?>