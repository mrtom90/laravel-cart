<?php

/**
 * Created by EC-SOL.
 * Author: Pham Thai Duong
 * Date: 2016/03/30
 * Time: 14:50
 */
use Illuminate\Database\Capsule\Manager as DB;

abstract class TestCase extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->setUpDatabase();
        $this->migrateTables();
    }

    protected function setUpDatabase()
    {
        $database = new DB;

        $database->addConnection(['driver' => 'sqlite', 'database' => ':memory:']);
        $database->bootEloquent();
        $database->setAsGlobal();
    }

    protected function migrateTables()
    {
        DB::schema()->create('posts', function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
    }

    protected function makePost()
    {
        $post = new Post;
        $post->title = 'Some title';
        $post->save();
        return $post;
    }

}

/**
 * @property string title
 */
class Post extends \Illuminate\Database\Eloquent\Model
{

}
