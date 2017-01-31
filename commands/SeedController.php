<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Book;
use yii\console\Controller;

class SeedController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'Data is Done')
    {
        $faker = \Faker\Factory::create();

        for ( $i = 1; $i <= 30; $i++ ) {
            $book = new Book();

            $book->title = $faker->words(3, true);
            $book->author = $faker->name;
            $book->versions = 1;
            $book->save();
        }

        echo "WoW we added 30 Books to your library \n";
        echo $message . "\n";
    }
}
