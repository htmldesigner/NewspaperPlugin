<?php

use Softlance\Newspaper\Models\Newspaper;
use Illuminate\Http\Request;
use Softlance\Newspaper\Models\OrderArticleSettings;

Route::group(['prefix' => 'api'], function () {

    Route::get('get_newspaperlist', function () {
        $newspaper = Newspaper::all();
        return $newspaper;
    });

    Route::post('get_releases', function (Request $req) {
        $data = $req->input();

        $newspaper = Newspaper::find($data['id']);

        if ($data['type'] === 'article') {
            if ($newspaper) {
                return ['releases' =>
                    $newspaper->releases()->where('release_date', '>', Carbon\Carbon::now()->addDay(3)->format('Y-m-d'))->get(),
                    'article_photo_size' => $newspaper->articleImageSize,
                    'order_article' => $newspaper->orderArticleSettings
                ];
            } else {
                return ['message' => 'not found article'];
            }
        }

        if ($data['type'] === 'banner') {
            if ($newspaper) {

                $releases = $newspaper->releases()->where('release_date', '>', Carbon\Carbon::now()->addDay(3)->format('Y-m-d'))->get();

                foreach ($releases as $release) {
                    foreach ($release->orders as $order) {
                        if (!isset($release->attributes['banner']))
                            $release->attributes['banner'] = [];

                        if ($order->banner_id) {
                            $release->attributes['banner'][] = $order->banner_id;
                        }
                    }
                }

                return ['releases' =>
                    $releases->map(function ($item) {
                        $item = $item->toArray();
                        unset($item['orders']);
                        return $item;
                    }),

                    'banners'
                    => $newspaper->banner()->where('newspaper_id', $data['id'])->get()
                ];
            } else {
                return ['message' => 'not found banner'];
            }
        }


    });

});


