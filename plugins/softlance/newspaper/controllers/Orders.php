<?php namespace Softlance\Newspaper\Controllers;

use Backend\Widgets\Form;
use BackendMenu;
use Backend\Classes\Controller;
use Softlance\Newspaper\Models\Order;

/**
 * Orders Back-end Controller
 */
class Orders extends Controller
{

    protected $model;
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';






    public function __construct()
    {
        
        parent::__construct();

        BackendMenu::setContext('Softlance.Newspaper', 'newspaper', 'orders');
        $this->addJs("/plugins/softlance/newspaper/assets/js/custom.js", "1.0.0");
    }
    public function update($recordId){
        $order = Order::find($recordId);
//        $this->vars['article_prices'] = $order->getArticlePriceListOptions(null, null);

        $this->model = $order;
        parent::update($recordId);

    }



    public function formExtendFields(Form $form)
    {
//        if($this->model && $this->model->article_id){
//           $form->removeField('orderArticleSettings');
//        }

        if($this->model && $this->model->banner_id && !$this->model->article){
            $form->removeTab('Статья');
        }

        if($this->model && !$this->model->banner_id && ($this->model->article || $this->model->article_id)){
            $form->removeTab('Баннер');
        }

    }
}
