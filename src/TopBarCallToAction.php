<?php
/**
 * Top Bar Call To Action plugin for Craft CMS 3.x
 *
 * Get more clicks and leads with our easy to use Top Bar CTA.
 *
 * @link      https://brixplugins.com/
 * @copyright Copyright (c) 2021 BRIX Plugins
 */

namespace brixplugins\topbarcalltoaction;

use brixplugins\topbarcalltoaction\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\events\RegisterCpNavItemsEvent;
use craft\web\twig\variables\Cp;
use craft\web\View;

use yii\base\Event;

/**
 * Class TopBarCallToAction
 *
 * @author    BRIX Plugins
 * @package   TopBarCallToAction
 * @since     1.0.0
 *
 */
class TopBarCallToAction extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var TopBarCallToAction
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public $hasCpSettings = true;

    /**
     * @var bool
     */
    public $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Event::on(
            Cp::class,
            Cp::EVENT_REGISTER_CP_NAV_ITEMS,
            function(RegisterCpNavItemsEvent $event) {
                $event->navItems[] = [
                    'url' => 'settings/plugins/top-bar-call-to-action',
                    'label' => \Craft::t('app', 'Top Bar CTA'),
                    'id' => 'nav-top-bar-call-to-action',
                    'icon' => '@vendor/brixplugins/top-bar-call-to-action/src/icon-mask.svg'
                ];
            }
        );

        Craft::info(
            Craft::t(
                'top-bar-call-to-action',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );

        $site_active = false;        
        
        if( $this->getSettings()->disableAllSites ) {
            
            $sites_array = explode(",", $this->getSettings()->txtActivePages);
           
            if( in_array(Craft::$app->getSites()->getCurrentSite()->id, $sites_array) ) {
                $site_active = true;
            }                     

        } else {
            $site_active = true;
        }
        
        if( $site_active AND $this->getSettings()->enableTopBarCTA AND !strpos($_SERVER['REQUEST_URI'], '/'.craft\helpers\App::env('CP_TRIGGER') ?: 'admin') ) {

            \Craft::$app->view->registerAssetBundle('brixplugins\\topbarcalltoaction\\assetbundles\\topbar\\TopBarAsset');
            
            \Craft::$app->view->registerCss('.top-bar {background-color:'.$this->getSettings()->colorBar.' !important;} .top-bar p { color: '.$this->getSettings()->colorTextBar.' !important; } .top-bar a {background-color: '.$this->getSettings()->colorButton.' !important;color: '.$this->getSettings()->colorTextButton.'!important;}');

            if( !$this->getSettings()->enableOnMobile ) {            
                \Craft::$app->view->registerCss('.bar-type-1 + div, .bar-type-2 + div {margin-top: 0;} .bar-type-3 + div {margin-top: 0;} @media (max-width: 992px) {.top-bar { display: none; }}');
            }
            
            if( $this->getSettings()->enableCustomCSS ) {            
                \Craft::$app->view->registerCss( $this->getSettings()->txtAreaCustomCSS );
            }
            
            if( $this->getSettings()->stickyBar ) {            
                \Craft::$app->view->registerCss( '.top-bar {position: fixed;top: 0;left: 0;z-index: 9999; width: 100%; .bar-type-1 + div, .bar-type-2 + div{margin-top: 72px;}.bar-type-3 + div {margin-top: 116px;}} @media (max-width: 767px) { .bar-type-1 + div {margin-top: 72px;}.bar-type-2 + div, .bar-type-3 + div {margin-top: 110px;} } ' );
            }

            Event::on(
                View::class,
                View::EVENT_BEGIN_BODY,
                function(Event $event) {
                    echo '<div class="top-bar '.$this->getSettings()->barType.'"><p>'.$this->getSettings()->txtBar.'</p><a href="'.$this->getSettings()->txtBtnLink.'" target="_blank">'.$this->getSettings()->txtBtn.'</a></div>';
                }
            );

        }

    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */

    public function getSettingsResponse()
    {
        return \Craft::$app
            ->controller
            ->renderTemplate('top-bar-call-to-action/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
    
}