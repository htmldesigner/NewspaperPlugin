<?php namespace Softlance\Newspaper\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * articleSelector Form Widget
 */
class ArticleSelector extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
//    protected $defaultAlias = 'softlance_newspaper_article_selector';
    protected $defaultAlias = 'articleSelector';

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
        return $this->makePartial('articleselector');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
        $this->vars['article_prices'] = $this->model->getArticlePriceListOptions(null, null);
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/articleselector.css', 'softlance.newspaper');
        $this->addJs('js/articleselector.js', 'softlance.newspaper');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
