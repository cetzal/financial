<?php
/**
 *##  TbSelectMultiple class file.
 *
 * @author Alberto Jimenez <a18327@hotmail.com>
 * @license [New BSD License](http://www.opensource.org/licenses/bsd-license.php)
 */

/**
 *## bootstrap-select wrapper widget
 *
 * @see http://silviomoreto.github.io/bootstrap-select/
 *
 */
class TbBootstrapSelect extends CInputWidget
{
	/**
	 * @var TbActiveForm when created via TbActiveForm.
	 * This attribute is set to the form that renders the widget
	 * @see TbActionForm->inputRow
	 */
	public $form;
	/**
	 * @var array @param data for generating the list options (value=>display)
	 */
	public $data = array();

	/**
	 * @var string[] the JavaScript event handlers.
	 */
	public $events = array();

	/**
	 * @var bool whether to display a dropdown select box multiple
	 */
	public $multiple = true;
		
	/**
	 * @var bool whether to display a dropdown select box with search
	 */
	public $data_live_search = true;
	
	/**
	 * @var string the default value.
	 */
	public $val;

	/**
	 * @var
	 */
	public $options;

	/**
	 *### .init()
	 *
	 * Initializes the widget.
	 */
	public function init()
	{
		$this->normalizeData();

		$this->normalizeOptions();

		$this->setDefaultWidthIfEmpty();
	}

	/**
	 *### .run()
	 *
	 * Runs the widget.
	 */
	public function run()
	{
		list($name,$id) = $this->resolveNameID();
		
		if ($this->hasModel()) {
			if ($this->form) {
				$this->htmlOptions['class']=$this->htmlOptions['class']." selectpicker";						
				echo $this->form->dropDownList($this->model, $this->attribute, $this->data, $this->htmlOptions);
					
			} else {
				$this->htmlOptions['class']=$this->htmlOptions['class']." selectpicker";
				echo CHtml::activeDropDownList($this->model, $this->attribute, $this->data, $this->htmlOptions);
			}

		} else {			
			$this->htmlOptions['class']="selectpicker";
			if($this->multiple){
				$this->htmlOptions['multiple']="multiple";
			}			
			$this->htmlOptions['data-live-search']=$this->data_live_search;
			echo CHtml::dropDownList($this->name, $this->value, $this->data, $this->htmlOptions);
		}

		$this->registerClientScript($id);
	}

	/**
	 *### .registerClientScript()
	 *
	 * Registers required client script for bootstrap select2. It is not used through bootstrap->registerPlugin
	 * in order to attach events if any
	 */
	public function registerClientScript($id)
	{
		Yii::app()->bootstrap->registerPackage('selectpicker');
				
		$options = !empty($this->options) ? CJavaScript::encode($this->options) : '';

		$defValue = !empty($this->val) ? ".selectpicker('val', '$this->val')" : '';

		ob_start();
		echo "jQuery('#{$id}').selectpicker({$options})$defValue";
		foreach ($this->events as $event => $handler) {
			echo ".on('{$event}', " . CJavaScript::encode($handler) . ")";
		}

		Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $this->getId(), ob_get_clean() . ';',CClientScript::POS_LOAD);		
	}

	private function setDefaultWidthIfEmpty()
	{
		if (empty($this->options['width'])) {
			$this->options['width'] = 'auto';
		}
	}

	private function normalizeData()
	{
		if (!$this->data)
			$this->data = array();
	}
	private function normalizeOptions()
	{
		if (empty($this->options)) {
			$this->options = array();
		}
	}

	private function prependDataWithEmptyItem()
	{
		$this->data[''] = '';
	}
}
