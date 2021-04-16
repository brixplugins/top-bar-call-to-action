<?php
/**
 * Top Bar Call To Action plugin for Craft CMS 3.x
 *
 * Get more clicks and leads with our easy to use Top Bar CTA.
 *
 * @link      https://brixplugins.com/
 * @copyright Copyright (c) 2021 BRIX Plugins
 */

namespace brixplugins\topbarcalltoaction\models;

use brixplugins\topbarcalltoaction\TopBarCallToAction;

use Craft;
use craft\base\Model;

/**
 * @author    BRIX Plugins
 * @package   TopBarCallToAction
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var string
     */
    public $txtBar = 'Get 20% OFF Today on our Products!';
    public $txtBtn = 'Buy Now!';
    public $txtBtnLink = 'https://brixplugins.com';
    public $enableTopBarCTA = true;
    public $barType = 'bar-type-2';
    public $colorBar = '#2D7EFF';
    public $colorButton = '#FFFFFF';
    public $colorTextBar = '#FFFFFF';
    public $colorTextButton = '#2D7EFF';
    public $txtActivePages = '';
    public $enableOnMobile = true;
    public $stickyBar = false;
    public $disableAllSites = false;
    public $enableCustomCSS = false;
    public $txtAreaCustomCSS = '.top-bar {
        background: #FE742A;
        height: 54px;
    }';

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['txtBar', 'string'],
            ['txtBar', 'default', 'value' => 'Get 20% OFF Today on our Products!'],
            ['txtBtn', 'string'],
            ['txtBtn', 'default', 'value' => 'Buy Now!'],
            ['txtBtnLink', 'string'],
            ['txtBtnLink', 'default', 'value' => 'https://brixplugins.com'],
            ['enableTopBarCTA', 'boolean'],
            ['enableTopBarCTA', 'default', 'value' => false ],
            ['barType', 'string'],
            ['barType', 'default', 'value' => 'bar-type-2' ],
            ['colorBar', 'string'],
            ['colorBar', 'default', 'value' => '#2D7EFF' ],
            ['colorButton', 'string'],
            ['colorButton', 'default', 'value' => '#FFFFFF' ],
            ['colorTextBar', 'string'],
            ['colorTextBar', 'default', 'value' => '#FFFFFF' ],
            ['colorTextButton', 'string'],
            ['colorTextButton', 'default', 'value' => '#2D7EFF' ],
            ['enableCustomCSS', 'boolean'],
            ['enableCustomCSS', 'default', 'value' => false ],
            ['enableOnMobile', 'boolean'],
            ['enableOnMobile', 'default', 'value' => false ],
            ['stickyBar', 'boolean'],
            ['stickyBar', 'default', 'value' => false ],
            ['disableAllSites', 'boolean'],
            ['disableAllSites', 'default', 'value' => false ],
            ['txtActivePages', 'string'],
            ['colorTextButton', 'default', 'value' => '' ],
            ['txtAreaCustomCSS', 'string'],
            ['txtAreaCustomCSS', 'default', 'value' => '.top-bar {
                background: #FE742A;
                height: 54px;
            }' ],
        ];
    }
}

