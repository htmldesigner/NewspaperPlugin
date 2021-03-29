<?php namespace Softlance\Newspaper\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * bannerSelector Form Widget
 */
class BannerSelector extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'bannerSelector';

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
        return $this->makePartial('bannerselector');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
        $this->vars['banner'] = $this->model->getBannerOptions(null, null);
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/bannerselector.css', 'softlance.newspaper');
        $this->addJs('js/bannerselector.js', 'softlance.newspaper');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
