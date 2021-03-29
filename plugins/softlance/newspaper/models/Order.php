<?php namespace Softlance\Newspaper\Models;

use League\Flysystem\Exception;
use Model;

/**
 * Order Model
 */
class Order extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'softlance_newspaper_orders';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = ['article_settings', 'banner_settings'];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [

    ];
    public $hasMany = [];
    public $belongsTo = [
        'newspaper' => [Newspaper::class, 'key' => 'newspaper_id'],
        'banner' => [Banner::class, 'key' => 'banner_id'],
        'articleImageSize' => [ArticleImageSize::class, 'key' => 'article_image_size_id'],
        'orderArticleSettings' => [OrderArticleSettings::class, 'key' => 'article_id'],
    ];
    public $belongsToMany = [
        'releases' => [Release::class, 'table' => 'softlance_newspaper_orders_releases']
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];


    public function getArticlePriceListOptions($value, $formData)
    {
        try {
            $article = $this->newspaper->article->article_price_list;
            $arr = [];
            foreach ($article as $key => $value) {
                $arr[] = [
                    'title' => $value['article_name'] . ' Цена - ' . $value['article_price'],
                    'price' => $value['article_price'],
                    'symbol_count' => $value['symbol_count']
                ];
            }
            return $arr;
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getPhotoSizeOptions($value, $formData)
    {
        try {

            $article = $this->newspaper->article->photo_size;
            $arr = [];

            foreach ($article as $key => $value) {
                $arr[] = [
                    'title' => $value['photo_name'] . ' Цена - ' . $value['photo_price'] . ' Вес - ' . $value['weight_in_symbol'],
                    'photo_name' => $value['photo_name'],
                    'photo_price' => $value['photo_price'],
                    'weight_in_symbol' => $value['weight_in_symbol']
                ];
            }
            return $arr;
        } catch (\Exception $e) {
            return [];
        }
    }


    public function getSymbolPriceAttribute($value)
    {
        if ($this->newspaper) {
            $symbolPrice = $this->newspaper->article;
            if ($symbolPrice) {
                return $symbolPrice->symbol_price;
            }
        }
    }

    public function getReleaseCountAttribute($value)
    {
        return $this->releases->count();
    }

    public function getBannerOptions($value, $formData)
    {
        try {
            $banner = $this->newspaper->banner->banner_arguments;
            $arr = [];
            foreach ($banner as $key => $value) {
                $arr[] = [
                    'title' => $value['banner_size'] . ' Цена - ' . $value['banner_price'],
                    'banner_size' => $value['banner_size'],
                    'banner_price' => $value['banner_price'],
                ];
            }
            return $arr;
        } catch (\Exception $e) {
            return [];
        }
    }

}
