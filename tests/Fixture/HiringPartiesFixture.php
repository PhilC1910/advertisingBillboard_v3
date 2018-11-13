<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HiringPartiesFixture
 *
 */
class HiringPartiesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'hiring_party_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'hiring_party_details' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'hiring_party_type_code_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'hiring_party_type_code_id' => ['type' => 'index', 'columns' => ['hiring_party_type_code_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['hiring_party_id'], 'length' => []],
            'hiring_parties_ibfk_1' => ['type' => 'foreign', 'columns' => ['hiring_party_type_code_id'], 'references' => ['ref_hiring_party_types', 'hiring_party_type_code_id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'hiring_party_id' => 1,
                'hiring_party_details' => 'Lorem ipsum dolor sit amet',
                'hiring_party_type_code_id' => 1,
                'created' => '2018-10-06 01:11:53',
                'modified' => '2018-10-06 01:11:53'
            ],
        ];
        parent::init();
    }
}
