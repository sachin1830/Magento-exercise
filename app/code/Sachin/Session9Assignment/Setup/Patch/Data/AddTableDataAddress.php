<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddTableDataAddress implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * AddTableData constructor.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Apply
     *
     * @return AddTableData|void
     */
    public function apply()
    {
        $setup = $this->moduleDataSetup;

        $setup->getConnection()->insertMultiple(
            $setup->getTable('sachin_address'),
            [
                [
                    'entity_id' => 17,
                    'country' => 'India',
                    'city' => 'Bhubaneswar',
                    'state' => 'Odisha',
                    'street' => 'Dumuduma H.B Colony',
                    'zip' => '751019',
                    'phone' => '70083567639',

                ],
                [
                    'entity_id' => 17,
                    'country' => 'India',
                    'city' => 'Bangalore',
                    'state' => 'Karnataka',
                    'street' => 'BTM 9th cross',
                    'zip' => '70059',
                    'phone' => '70083567639',
                ]
            ]
        );
    }

    /**
     * GetAliases
     *
     * @return array
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * GetDependencies
     *
     * @return array
     */
    public static function getDependencies()
    {
        return [];
    }
}
