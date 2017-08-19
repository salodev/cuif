<?php
namespace cuif;
class AlertWindow extends Window {
	public function init(array $params = array()) {
		$this->title=isset($params['title'])?$params['title']:'Alert:';
		$this->createLabelBox(1, 0, $params['text']);
		$this->height=1;
		$this->setToolKeys(array(
			'<ENTER>, <ESCAPE>' => 'Close',
		));
		$this->bind('keyPress', function(Input $input) {
			$spec = $input->spec;
			if ($spec=='ESCAPE'||$spec=='RETURN') {
				$this->close();
				$this->trigger('close');
			}
		});
	}
}