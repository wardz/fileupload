<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends TestCase
{
    protected $URL = '/project';

    // update, destroy
    // validation?
    // permissions
    // assert 404 on non existing,
    // forbidden etc

    protected $user;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->user = App\User::where('name', '=', 'admin')->firstOrFail();
    }

    public function testViewsWithAuth()
    {
        $URL = $this->URL;
        $project = $this->user->projects()->where('name', '=', 'test')->firstOrFail();

        view()->composer('project.form', function($view) {
            $this->assertArrayHasKey('tags', $view->getData());
        });

        $this->actingAs($this->user)
            ->visit($URL . '/create')
            ->assertResponseOk();

        $this->actingAs($this->user)
            ->visit($URL)
            ->assertResponseOk()
            ->assertViewHas('projects');

        $this->actingAs($this->user)
            ->visit($URL . '/test')
            ->assertResponseOk()
            ->assertViewHas('project');

        /*$this->actingAs($this->user)
            ->visit($URL . '/nonexistingproject')
            ->assertResponseStatus(404);*/

        $this->actingAs($this->user)
            ->visit($URL . '/test/edit')
            ->assertResponseOk()
            ->assertViewHas('project');
    }

    public function testViewsNoAuth()
    {
        $URL = $this->URL;

        $this->visit($URL . '/create')
            ->seePageIs('/login');

        $this->visit($URL)
            ->seePageIs('/login');

        $this->visit($URL . '/test')
            ->assertResponseOk()
            ->assertViewHas('project');

        /*$this->visit($URL . '/nonexistingproject')
            ->assertResponseStatus(404);*/

        $this->visit($URL . '/test/edit')
            ->seePageIs('/login');
    }

    /*public function testStore()
    {
        $URL = $this->URL;

        $this->actingAs($this->user)
            ->visit($URL . '/create')

            ->type('Test project', 'name')
            ->type('MIT License', 'license')
            ->select('1', 'tag_list[]')
            ->type('Test description 10 characters', 'description')
            ->type('v1', 'file_version')
            ->type('Test changelog 10 characters', 'file_changelog')
            ->attach(dirname(__FILE__) . '/test.zip', 'file')

            ->press('submit')
            ->seePageIs($URL);

        $this->seeInDatabase('projects', [
            'name' => 'Test project',
            'license' => 'MIT License',
            'description' => 'Test description 10 characters',
            'downloads' => 0,
            'user_id' => $this->user->id
        ]);

        $project = $this->user->projects()->latest()->get()->first();
        $file = $project->files()->latest()->get()->first();
        $this->seeInDatabase('files', [
            'file_name' => 'test.zip',
            'file_version' => 'v1',
            'file_changelog' => 'Test changelog 10 characters',
            'file_size' => '1072',
            'project_id' => $file->project_id
            //'file_path' => ''
        ]);
    }*/
}
