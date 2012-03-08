<?php
	class AppError extends ErrorHandler {
		function inValidAccess($params) {
			$this->_outputMessage('invalid_access');
		}
	}
?>
