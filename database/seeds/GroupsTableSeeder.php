<?php

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Category;
use App\Models\User;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Faker 实例
        $faker = app(Faker\Generator::class);

        $logos = [
            'http://pisoqe40a.bkt.clouddn.com/144425l7i2zg2372h7hzyd.jpg',
            'http://pisoqe40a.bkt.clouddn.com/4d65a6800d3370809ef069d5e0f1ab83.jpg',
            'http://pisoqe40a.bkt.clouddn.com/Pokemon.jpg',
            'http://pisoqe40a.bkt.clouddn.com/0e0b68c22b990c7cc2e3e1a09304fb5e_1200x500.jpg',
        ];

        // 生成数据集合并转化成数组
        $groups = factory(Group::class)
                        ->times(10)
                        ->make()
                        ->each(function ($group, $index)
                            use ($faker, $logos)
        {
            // 随机logo
            $group->logo = $faker->randomElement($logos);
            // 随机分组
            $category = Category::inRandomOrder()->first();
            $group->category_id = $category->id;
            $category->increment('group_count');
        })
            ->toArray();

        // 写入数据库
        Group::insert($groups);

        // 随机取一个用户作为圈子创建人
        foreach (Group::all() as $group) {
            $user = User::inRandomOrder()->first();
            $group->users()->attach($user->id, ['level' => 1]);
            $group->member_count = 1;
            $group->save();
        }
    }
}
