<?php
/**
 * unicode like code page 437 (CP437)
 * http://jonathonhill.net/2012-11-26/box-drawing-in-php/
 * https://en.wikipedia.org/wiki/Code_page_437
 */
namespace cuif;
class Output {
	static public function Get($spec) {
		$specs = [
			'h'   => '2500',
			'v'   => '2502',
			'+'   => '253C',
			'tl'  => '250C',
			'tr'  => '2510',
			'br'  => '2518',
			'bl'  => '2514',
			'htl' => '251C',
			'htr' => '2524',
		];
		if (isset($specs[$spec])) {
			$h=$specs[$spec];
			return html_entity_decode('&#x' . $h . ';', ENT_NOQUOTES, 'UTF-8');
		}
	}
	static public function ShowTable() {
		for($a=250;$a<258;$a++) {
			foreach(str_split('0123456789ABCDEF') as $b) {
				$h = "{$a}{$b}";
				$o = html_entity_decode('&#x' . $h . ';', ENT_NOQUOTES, 'UTF-8');
				$b = bin2hex($o);
				echo $b . ' ' . hex2bin($b) . "\n";
			}
		}
	}
}