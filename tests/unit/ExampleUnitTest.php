<?php
/**
 * Top Bar Call To Action plugin for Craft CMS 3.x
 *
 * Get more clicks and leads with our easy to use Top Bar CTA.
 *
 * @link      https://brixplugins.com/
 * @copyright Copyright (c) 2021 BRIX Plugins
 */

namespace brixplugins\topbarcalltoactiontests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use brixplugins\topbarcalltoaction\TopBarCallToAction;

/**
 * ExampleUnitTest
 *
 *
 * @author    BRIX Plugins
 * @package   TopBarCallToAction
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            TopBarCallToAction::class,
            TopBarCallToAction::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
