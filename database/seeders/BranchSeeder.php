<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | الأقسام
        |--------------------------------------------------------------------------
        */

        $categories = [
            [
                'name' => 'الكهرباء',
                'description' => 'كل مستلزمات وأدوات الكهرباء',
                'image' => null,
            ],

            [
                'name' => 'الإضاءة',
                'description' => 'لمبات ووحدات الإضاءة ومستلزماتها',
                'image' => null,
            ],

            [
                'name' => 'الأدوات الكهربائية',
                'description' => 'الأدوات والأجهزة الكهربائية',
                'image' => null,
            ],

            [
                'name' => 'مستلزمات المنزل',
                'description' => 'مستلزمات وأدوات المنزل',
                'image' => null,
            ],

            [
                'name' => 'الكابلات والأسلاك',
                'description' => 'كابلات وأسلاك الكهرباء ومستلزماتها',
                'image' => null,
            ],

            [
                'name' => 'المفاتيح والبرايز',
                'description' => 'مفاتيح وبرايز الكهرباء',
                'image' => null,
            ],

            [
                'name' => 'لوحات الكهرباء',
                'description' => 'لوحات الكهرباء والقواطع ومستلزماتها',
                'image' => null,
            ],

            [
                'name' => 'الأدوات والمستلزمات',
                'description' => 'عدد وأدوات ومستلزمات فنية',
                'image' => null,
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | إنشاء الأقسام والفروع
        |--------------------------------------------------------------------------
        */

        foreach ($categories as $categoryData) {

            $category = ProductCategory::firstOrCreate(
                [
                    'name' => $categoryData['name'],
                ],
                [
                    'description' => $categoryData['description'],
                    'image' => $categoryData['image'],
                ]
            );

            /*
            |--------------------------------------------------------------------------
            | الفروع الخاصة بالقسم
            |--------------------------------------------------------------------------
            */

            $branches = [
                'الفرع الرئيسي',
                'فرع المبيعات',
                'فرع الجملة',
            ];

            foreach ($branches as $index => $branchName) {

                Branch::firstOrCreate(
                    [
                        'category_id' => $category->id,
                        'name' => $branchName,
                    ],
                    [
                        'slug' => Str::slug(
                            $category->name . '-' . $branchName
                        ) . '-' . $category->id . '-' . ($index + 1),

                        'description' =>
                            $branchName . ' - قسم ' . $category->name,

                        'image' => null,

                        'status' => true,

                        'sort_order' => $index + 1,
                    ]
                );
            }
        }
    }
}