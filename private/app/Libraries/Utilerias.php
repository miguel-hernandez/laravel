<?php
namespace App\libraries;

class Utilerias{
	public function __construct() {
		date_default_timezone_set(ZONAHORARIA);
	}

	public static function get_array_panelblade($request, $contexto, $action){
			$usuario_session = $request->session()->get(DATOSUSUARIO);
			return array('modulo' => $contexto->modulo,
						 			 'modulo_url' => self::limpia_string($contexto->modulo),
									 'username' => $usuario_session->username,
									 'action' => $action
									);
	}

	public static function limpia_string($string) {
		$string = trim($string);

		$string = str_replace(
			array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
			array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
			$string
		);

		$string = str_replace(
			array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
			array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
			$string
		);

		$string = str_replace(
			array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
			array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
			$string
		);

		$string = str_replace(
			array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
			array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
			$string
		);

		$string = str_replace(
			array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
			array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
			$string
		);

		$string = str_replace(
			array('ñ', 'Ñ', 'ç', 'Ç'),
			array('n', 'N', 'c', 'C',),
			$string
		);

		$string = str_replace(
			array("\\", "¨", "º", "-", "~",
			"#", "@", "|", "!", "\"",
			"·", "$", "%", "&", "/",
			"(", ")", "?", "'", "¡",
			"¿", "[", "^", "<code>", "]",
			"+", "}", "{", "¨", "´",
				">", "< ", ";", ",", ":",
				".", " "),
				' ',
				$string
			);
			return strtolower($string);
		}// limpia_string()

		public static function get_nombremes($mes){
			 setlocale(LC_TIME, 'spanish');
			 $nombre = strftime("%B",mktime(0, 0, 0, $mes, 1, 2000));
			 return strtoupper($nombre);
		}

}// class Utilerias


?>
