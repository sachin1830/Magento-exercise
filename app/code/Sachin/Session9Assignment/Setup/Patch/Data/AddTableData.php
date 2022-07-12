<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddTableData implements DataPatchInterface
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
            $setup->getTable('sachin_entity'),
            [
              [
                  'entity_name' => 'sachin kumar biswal',
                  'age' => 23,
                  'height' => 5.6,
                  'short_description' => 'Hi i am sachin',
                  'long_description' => 'Hi, i am sachin i am from odisha , i am 23 years old.',
                  'is_employee' => 1
              ],
                [
                'entity_name' => 'Manisha Pattanayak',
                'age' => 22,
                'height' => 5.4,
                'short_description' => 'Hi i am manisha ',
                    'long_description' => 'Hi, i am manisha i am from odisha , i am 22 years old.',
                    'is_employee' => 1
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
