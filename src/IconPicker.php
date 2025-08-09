<?php

namespace lodesnaet\crafticonpicker;

use Craft;
use craft\base\Model;
use craft\base\Plugin;
use lodesnaet\crafticonpicker\models\Settings;

/**
 * IconPicker plugin
 *
 * @method static IconPicker getInstance()
 * @method Settings getSettings()
 * @author LodeSnaet <lode.snaet@outlook.com>
 * @copyright LodeSnaet
 * @license https://craftcms.github.io/license/ Craft License
 */
class IconPicker extends Plugin
{
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSettings = true;

    public static function config(): array
    {
        return [
            'components' => [
                // Define component configs here...
            ],
        ];
    }

    public function init(): void
    {
        parent::init();

        $this->attachEventHandlers();

        // Any code that creates an element query or loads Twig should be deferred until
        // after Craft is fully initialized, to avoid conflicts with other plugins/modules
        Craft::$app->onInit(function() {
            // ...
        });
    }

    protected function createSettingsModel(): ?Model
    {
        return Craft::createObject(Settings::class);
    }

    public function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            '_settings',
            [
                'settings' => $this->getSettings(),
                // usually you don't need to pass 'forms', it's available in CP templates globally
            ]
        );
    }


    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/5.x/extend/events.html to get started)
    }
}
