<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\User;
use App\Models\Group;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        // 用户 ID 数组
        $userIds = User::all()->pluck('id')->toArray();

        // 圈子 ID 数组
        $groups = Group::all();

        // Faker 实例
        $faker = app(Faker\Generator::class);

        $topics = factory(Topic::class)
                ->times(50)
                ->make()
                ->each(function ($topic, $index)
                    use ($userIds, $groups, $faker)
        {
            $topic->user_id = $faker->randomElement($userIds);
            $group = $groups->random();
            $topic->category_id = $group->category_id;
            $topic->group_id = $group->id;
        });

        // 将数据集合转为数组，并插入数据库
        Topic::insert($topics->toArray());
    }

}

