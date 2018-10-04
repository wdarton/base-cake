<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PeopleFixture
 *
 */
class PeopleFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'Primary', 'autoIncrement' => true, 'precision' => null],
        'first_name' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Their first name', 'precision' => null, 'fixed' => null],
        'middle_name' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Their last name', 'precision' => null, 'fixed' => null],
        'last_name' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Their last name', 'precision' => null, 'fixed' => null],
        'work_phone' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Work telephone number', 'precision' => null, 'fixed' => null],
        'home_phone' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Home telephone number', 'precision' => null, 'fixed' => null],
        'cellphone' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Home cellular phone number', 'precision' => null, 'fixed' => null],
        'fax' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Home fax number', 'precision' => null, 'fixed' => null],
        'home_address_line1' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Home address line 1', 'precision' => null, 'fixed' => null],
        'home_address_line2' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Home address line 2', 'precision' => null, 'fixed' => null],
        'home_address_line3' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Home address line 3', 'precision' => null, 'fixed' => null],
        'home_city' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Home address city', 'precision' => null, 'fixed' => null],
        'home_state' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Home Address State or Province', 'precision' => null, 'fixed' => null],
        'home_zip' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Home Address Zip Code', 'precision' => null, 'fixed' => null],
        'personal_email' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Personal email address', 'precision' => null, 'fixed' => null],
        'work_email' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Office email address', 'precision' => null, 'fixed' => null],
        'birth_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'Their day of birth - for SEC ', 'precision' => null],
        'default_timezone' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => 'America/Chicago', 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'supervisor' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Boolean value - if they can be a supervisor or not', 'precision' => null],
        'archived' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Archived or not (boolean)', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'When the data was created', 'precision' => null],
        'created_by' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Who created the data', 'precision' => null, 'fixed' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'When the data was last updated', 'precision' => null],
        'modified_by' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Who last updated the data', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'combo_index' => ['type' => 'unique', 'columns' => ['first_name', 'last_name'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'first_name' => 'Lorem ipsum dolor sit amet',
            'middle_name' => 'Lorem ipsum dolor sit amet',
            'last_name' => 'Lorem ipsum dolor sit amet',
            'work_phone' => 'Lorem ipsum dolor sit amet',
            'home_phone' => 'Lorem ipsum dolor sit amet',
            'cellphone' => 'Lorem ipsum dolor sit amet',
            'fax' => 'Lorem ipsum dolor sit amet',
            'home_address_line1' => 'Lorem ipsum dolor sit amet',
            'home_address_line2' => 'Lorem ipsum dolor sit amet',
            'home_address_line3' => 'Lorem ipsum dolor sit amet',
            'home_city' => 'Lorem ipsum dolor sit amet',
            'home_state' => 'Lorem ipsum dolor sit amet',
            'home_zip' => 'Lorem ipsum dolor sit amet',
            'personal_email' => 'Lorem ipsum dolor sit amet',
            'work_email' => 'Lorem ipsum dolor sit amet',
            'birth_date' => '2018-01-11',
            'default_timezone' => 'Lorem ipsum dolor sit amet',
            'supervisor' => 1,
            'archived' => 1,
            'created' => '2018-01-11 23:41:07',
            'created_by' => 'Lorem ipsum dolor sit amet',
            'modified' => '2018-01-11 23:41:07',
            'modified_by' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
