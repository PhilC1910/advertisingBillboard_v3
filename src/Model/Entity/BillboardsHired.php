<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BillboardsHired Entity
 *
 * @property int $billboard_hire_id
 * @property int $billboard_id
 * @property int $hiring_party_id
 * @property \Cake\I18n\FrozenTime $date_hired_from
 * @property \Cake\I18n\FrozenTime $date_hired_to
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\Billboard $billboard
 * @property \App\Model\Entity\HiringParty $hiring_party
 * @property \App\Model\Entity\User $user
 */
class BillboardsHired extends Entity
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
        'billboard_id' => true,
        'hiring_party_id' => true,
        'date_hired_from' => true,
        'date_hired_to' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'billboard' => true,
        'hiring_party' => true,
        'user' => true
    ];
}
