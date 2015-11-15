<?php

use App\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class UserControllerTest extends TestCase
{
    /**
     * @var StubUserController
     */
    protected $target;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    public function tearDown()
    {
        $this->target = null;
        parent::tearDown();
    }

    /**
     * Test UserController@index
     *
     * @group UserController
     * @group UserController0
     */
    public function testIndex()
    {
        // arrange
        $expected = new Collection([
            ['name' => 'oomusou', 'email' => 'oomusou@gmail.com'],
            ['name' => 'sam',     'email' => 'sam@gmail.com'],
            ['name' => 'sunny',   'email' => 'sunny@gmail.com'],
        ]);
        $this->target = new StubUserController($expected);

        // act
        /** @var View $view */
        $view = $this->target->index();
        $actual = $view->users;

        // assert
        $this->assertEquals($expected, $actual);
    }
}

class StubUserController extends UserController
{
    /**
     * @var Collection
     */
    private $users;

    /**
     * StubUserController constructor.
     * @param Collection $users
     */
    public function __construct(Collection $users)
    {
        $this->users = $users;
    }

    public function getAll()
    {
        return $this->users;
    }
}
