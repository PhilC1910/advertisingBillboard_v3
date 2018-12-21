<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HiringParty Entity
 *
 * @property int $hiring_party_id
 * @property string $hiring_party_details
 * @property int $hiring_party_type_code_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\RefHiringPartyType $ref_hiring_party_type
 */
class HiringParty extends Entity
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
        'hiring_party_details' => true,
        'hiring_party_type_code_id' => true,
        'created' => true,
        'modified' => true,
        'ref_hiring_party_type' => true,
         'agency' => true,
          'advertising_agency_client' => true
    ];
}
