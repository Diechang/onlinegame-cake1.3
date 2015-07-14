<?php
class Spec extends AppModel {
	var $name = 'Spec';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'title_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	//Callbacks
	function beforeValidate()
	{
		if(!empty($this->data["Spec"]))
		{
			$clumns = array(
				"caption",
				"os_low",
				"os_high",
				"cpu_low",
				"cpu_high",
				"memory_low",
				"memory_high",
				"disc_low",
				"disc_high",
				"graphic_low",
				"graphic_high",
				"sound_low",
				"sound_high",
				"network_low",
				"network_high",
				"display_low",
				"display_high",
				"directx_low",
				"directx_high",
				"other_low",
				"other_high",
			);
			//
			foreach($clumns as $clumn)
			{
				if(isset($this->data["Spec"][$clumn]))
				{
					$this->data["Spec"][$clumn]		= $this->trim($this->data["Spec"][$clumn]);
					$this->data["Spec"][$clumn]		= $this->emptyToNull($this->data["Spec"][$clumn]);
				}
			}
		}
		return true;
	}
}
?>