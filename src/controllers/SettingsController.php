namespace yournamespace\yourplugin\controllers;

use Craft;
use craft\web\Controller;

class SettingsController extends Controller
{
    public function actionIndex()
    {
        $this->requireAdmin();

        return $this->renderTemplate('your-plugin/settings', [
            'settings' => Craft::$app->plugins->getPlugin('your-plugin')->getSettings(),
        ]);
    }

    public function actionSaveSettings()
    {
        $this->requirePostRequest();
        $this->requireAdmin();

        $plugin = Craft::$app->plugins->getPlugin('your-plugin');
        $settings = $plugin->getSettings();

        $settings->fontAwesomeKitUrl = Craft::$app->getRequest()->getBodyParam('fontAwesomeKitUrl');

        if ($plugin->saveSettings($settings)) {
            Craft::$app->getSession()->setNotice('Settings saved.');
        } else {
            Craft::$app->getSession()->setError('Couldn’t save settings.');
        }

        return $this->redirectToPostedUrl();
    }
}