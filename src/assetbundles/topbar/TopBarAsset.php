<?php
/**
 * Top Bar Call To Action plugin for Craft CMS 3.x
 *
 * Get more clicks and leads with our easy to use Top Bar CTA.
 *
 * @link      https://brixplugins.com
 * @copyright Copyright (c) 2021 BRIX Plugins
 */

namespace brixplugins\topbarcalltoaction\assetbundles\topbar;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    BRIX Plugins
 * @package   TopBarCallToAction
 * @since     1.0.0
 */
class TopBarAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@brixplugins/topbarcalltoaction/assetbundles/topbar/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Index.js',
        ];

        $this->css = [
            'css/Index.css',
        ];

        parent::init();
    }
}
