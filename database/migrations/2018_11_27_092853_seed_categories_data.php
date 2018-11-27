<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => '高达',
                'description' => '万代（BANDAI）未正式进中国大陆销售前Gundam在大陆的翻译受香港影响多翻译为“高达”，而万代进驻中国大陆销售时注册名字时发现“高达”一词已被注册，所以改名为“敢达”。同样，进驻中国台湾地区时候，也因为“高达”一词已被注册，改名为“钢弹”。但因为“高达”的名字早已经深入民心，即使大陆和台湾官方并非以此称呼，但各地粉丝迷都一律称之为“高达”。不过，BANDAI已经决定在2017年9月开始，重新正式启用“高达”这一名称，解决了这么多年以来高达粉丝们的怨念。',
            ],
            [
                'name'        => '火影忍者',
                'description' => '《火影忍者》是日本漫画家岸本齐史的代表作，作品于1999年开始在《周刊少年JUMP》上连载，于2014年11月10日发售的JUMP第50号完结；后日谈性质的外传漫画《火影忍者外传：第七代火影与绯色花月》则于同杂志2015年第22、23合并号开始短期连载，至同年第32号完结。',
            ],
            [
                'name'        => '海贼王',
                'description' => '《航海王》是日本漫画家尾田荣一郎作画的少年漫画作品，在《周刊少年Jump》1997年34号开始连载。改编的电视动画《航海王》于1999年10月20日起在富士电视台首播。',
            ],
            [
                'name'        => '皮卡丘',
                'description' => '皮卡丘，日本任天堂公司发行的掌机游戏系列《精灵宝可梦》（中国大陆常称“口袋妖怪”）中登场精灵的一种，首次出现于第一世代游戏《精灵宝可梦：红/绿》。',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
