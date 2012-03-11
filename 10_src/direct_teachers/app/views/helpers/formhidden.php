<?php
class FormhiddenHelper extends AppHelper {
    var $helpers = array('Form');       

    function hiddenVars($modelName) {
        $ret = "";

        foreach ($this->data[$modelName] as $key => $val) {

        	if(is_array($val)){
				foreach( $val as $key2 => $val2 ){
					$ret .= $this->Form->hidden("$modelName.$key.$key2")."\n";

				}
        	}else{
	            $ret .= $this->Form->hidden("$modelName.$key")."\n";
        	}

        }
        return $ret;
    }
}
?>
