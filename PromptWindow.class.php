<?php
namespace cuif;
class PromptWindow extends Window {
	public function init(array $params = array()) {
		$title = $params['title'] ? $params['title'] : 'Enter a value';
		$text  = $params['text' ] ? $params['text' ] : '';
		$value = $params['value'] ? $params['value'] : '';
		$width = $params['width'] ? $params['width'] : 32;
		$windowWidth = $width + strlen($text) + 7;
		$this->width = $windowWidth;
		$this->title = $title;
		$i = $this->createInputBox(1, 0, $text, $value);
		$this->height=1;
		$this->setToolKeys(array(
			'S, Y, <ENTER>' => 'Confirm',
			'N, <ESCAPE>' => 'Calcel',
		));
		$this->keyPress('RETURN', function() use ($i) {
			$this->close();
			$this->trigger('confirm', $i->value);
		});
		$this->keyPress('ESCAPE', function() {
			$this->close();
			$this->trigger('cancel');
		});
	}
}