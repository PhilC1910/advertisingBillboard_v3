<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RefHiringPartyType Entity
 *
 * @property int $hiring_party_type_code_id
 * @property string $hiring_party_type_description
 * @property string $advertising_agency_client
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class RefHiringPartyType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'hiring_party_type_description' => true,
        'advertising_agency_client' => true,
        'created' => true,
        'modified' => true
    ];
}
