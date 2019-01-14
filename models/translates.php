<?php
/**
 * Created by PhpStorm.
 * User: alavi
 * Date: 12/15/18
 * Time: 4:33 PM
 */

namespace app\models;


class translates
{
    public static function strings($locale)
    {

    }

    public static $delete_project = [
        [
            ["text" => "خیر"]
        ]
    ];

    public static $main_menu_buttons = [
        [
            ["text" => "اضافه کردن پروژه"]
        ],
        [
            ["text" => "کل پروژه ها"]
        ],
        [
            ["text" => "اضافه کردن عضو جدید"]
        ],
        [
            ["text" => "اکسل داده ها"]
        ]
    ];

    public static $project_list_buttons = [
        [
            ["text" => "صفحه ی بعد"], ["text" => "صفحه ی قبل"]
        ],
        [
            ["text" => "منوی اصلی"]
        ]
    ];

    public static $project_owner = [
        [
            ["text" => "پروژه های من"]
        ],
        [
            ["text" => "تمام پروژه ها"]
        ],
        [
            ["text" => "منوی اصلی"]
        ]
    ];

    public static $status_buttons = [
        [
            [ "text" => "موفق" ], [ "text" => "ناموفق"]
        ],
        [
            ["text" => "بازگشت"]
        ]
    ];

    public static $main_menu = [
        [
            ["text" => "منوی اصلی"]
        ]
    ];

    public static $return = [
        [
            ["text" => "بازگشت"]
        ]
    ];

    public static $change_project_keyboard = [
        [
            ["text" => "ثبت یا تغییر نام کسب و کار"]
        ],
        [
            ["text" => "ثبت یا تغییر دسته بندی"]
        ],
        [
            ["text" => "ثبت یا تغییر تلگرام"]
        ],
        [
            ["text" => "ثبت یا تغییر اینستاگرام"]
        ],
        [
            ["text" => "ثبت یا تغییر وبسایت"]
        ],
        [
            ["text" => "حذف پروژه"]
        ],
        [
            ["text" => "بازگشت"]
        ]
    ];

    public static function newProjectButtons($telegram, $instagram, $web)
    {
        $data = [];
        if ($telegram == 0) {
            array_push($data, [
                ["text" => "تلگرام"]
            ]);
        }

        if ($instagram == 0) {
            array_push($data, [
                ["text" => "اینستاگرام"]
            ]);
        }

        if ($web == 0) {
            array_push($data, [
                ["text" => "وبسایت"]
            ]);
        }

        return $data;
    }

    public static function projectManagementButtons($initiated = 0)
    {
        $data = [
            [
                ["text" => "تغییر پروژه"]
            ],
            [
                ["text" => "اضافه کردن مذاکره"]
            ]
        ];

        if ($initiated == 0) {
            array_push($data, [
                ["text" => "ثبت نهایی و منوی اصلی"]
            ]);
        } else {
            array_push($data, [
                ["text" => "منوی اصلی"]
            ]);
        }

        return $data;
    }

    public static $category_buttons = [
        [
            ['text' => 'Consumer Goods/services', 'callback_data' => '1'], ['text' => 'Retail', 'callback_data' => '2']
        ],
        [
            ['text' => 'Travel/hospitality', 'callback_data' => '3'], ['text' => 'Media/Entertainment', 'callback_data' => '4']
        ],
        [
            ['text' => 'Education', 'callback_data' => '5'], ['text' => 'Nonprofit', 'callback_data' => '6']
        ],
        [
            ['text' => 'Healthcare', 'callback_data' => '7'], ['text' => 'Professional/commercial Services', 'callback_data' => '8']
        ],
        [
            ['text' => 'IT / TeleComuniction Service', 'callback_data' => '8'], ['text' => 'Automotive', 'callback_data' => '10']
        ],
        [
            ['text' => 'Transportation/Delivery', 'callback_data' => '11'], ['text' => 'Realestate', 'callback_data' => '12']
        ],
        [
            ['text' => 'Financial services', 'callback_data' => '13'], ['text' => 'بازگشت', 'callback_data' => 'بازگشت']
        ],
    ];

    public static $category_buttons_new_project = [
        [
            ['text' => 'Consumer Goods/services', 'callback_data' => '1'], ['text' => 'Retail', 'callback_data' => '2']
        ],
        [
            ['text' => 'Travel/hospitality', 'callback_data' => '3'], ['text' => 'Media/Entertainment', 'callback_data' => '4']
        ],
        [
            ['text' => 'Education', 'callback_data' => '5'], ['text' => 'Nonprofit', 'callback_data' => '6']
        ],
        [
            ['text' => 'Healthcare', 'callback_data' => '7'], ['text' => 'Professional/commercial Services', 'callback_data' => '8']
        ],
        [
            ['text' => 'IT / TeleComuniction Service', 'callback_data' => '8'], ['text' => 'Automotive', 'callback_data' => '10']
        ],
        [
            ['text' => 'Transportation/Delivery', 'callback_data' => '11'], ['text' => 'Realestate', 'callback_data' => '12']
        ],
        [
            ['text' => 'Financial services', 'callback_data' => '13'], ['text' => 'منوی اصلی', 'callback_data' => 'منوی اصلی']
        ],
    ];

}