<?php

use App\SiteRepository;

class SitesTest extends TestCase
{

    /**
     * @var string
     */
    protected $resourceType = 'sites';

    public function testCreate()
    {
        // ensure 'my-site' doesn't exist before creating it...
        app(SiteRepository::class)->remove('my-site');

        $data = [
            'type' => 'sites',
            'id' => 'my-site',
            'attributes' => [
                'name' => 'My Blog',
                'domain' => 'http://blog.example.com',
            ],
        ];

        $id = $this->doCreate($data)->assertCreateResponse($data);
        $this->assertEquals('my-site', $id);

        return $data;
    }

    /**
     * @param array $expected
     * @depends testCreate
     */
    public function testRead(array $expected)
    {
        $this->doRead('my-site')->assertReadResponse($expected);
    }

    /**
     * @depends testCreate
     */
    public function testUpdate()
    {
        $data = [
            'type' => 'sites',
            'id' => 'my-site',
            'attributes' => [
                'name' => 'My New Blog',
            ],
        ];

        $expected = $data;
        $expected['domain'] = 'blog.example.com';

        $this->doUpdate($data)->assertUpdateResponse($expected);
    }

    /**
     * @depends testCreate
     */
    public function testDelete()
    {
        $this->doDelete('my-site')->assertDeleteResponse();
        $this->assertNull(app(SiteRepository::class)->find('my-site'));
    }

}
