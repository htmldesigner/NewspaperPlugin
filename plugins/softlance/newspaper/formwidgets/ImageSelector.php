<?php namespace Softlance\Newspaper\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * imageSelector Form Widget
 */
class ImageSelector extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'imageSelector';

    /**
     * @inheritDoc
     */
    public function init()
    {
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('imageselector');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
        $this->vars['image_prices'] = $this->model->getPhotoSizeOptions(null, null);
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/imageselector.css', 'softlance.newspaper');
        $this->addJs('js/imageselector.js', 'softlance.newspaper');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
