<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BillboardsHiredFixture
 *
 */
class BillboardsHiredFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'billboards_hired';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'billboard_hire_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'billboard_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'hiring_party_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'date_hired_from' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'date_hired_to' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'billboard_id' => ['type' => 'index', 'columns' => ['billboard_id', 'hiring_party_id'], 'length' => []],
            'billboard_id_2' => ['type' => 'index', 'columns' => ['billboard_id', 'hiring_party_id'], 'length' => []],
            'billboard_id_3' => ['type' => 'index', 'columns' => ['billboard_id', 'hiring_party_id'], 'length' => []],
            'hiring_party_id' => ['type' => 'index', 'columns' => ['hiring_party_id'], 'length' => []],
            'user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['billboard_hire_id'], 'length' => []],
            'billboards_hired_ibfk_1' => ['type' => 'foreign', 'columns' => ['billboard_id'], 'references' => ['billboards', 'billboard_id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'billboards_hired_ibfk_2' => ['type' => 'foreign', 'columns' => ['hiring_party_id'], 'references' => ['hiring_parties', 'hiring_party_id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'billboards_hired_ibfk_3' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'user_id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'billboard_hire_id' => 1,
                'billboard_id' => 1,
                'hiring_party_id' => 1,
                'date_hired_from' => '2018-10-06 01:11:07',
                'date_hired_to' => '2018-10-06 01:11:07',
                'created' => '2018-10-06 01:11:07',
                'modified' => '2018-10-06 01:11:07',
                'user_id' => 1
            ],
        ];
        parent::init();
    }
}
