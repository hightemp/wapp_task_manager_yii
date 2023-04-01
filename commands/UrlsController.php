<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use Yii;
use yii\helpers\Url;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class UrlsController extends Controller
{
    public function actionList()
    {
        $controllers = glob(Yii::$app->basePath . '/controllers/*.php');
        foreach ($controllers as $controller) {
            $filename = basename($controller, '.php');
            $className = 'app\controllers\\' . $filename;
            $methods = get_class_methods($className);
            foreach ($methods as $method) {
                if (preg_match("/^action/", $method)) {
                    // $url = Url::toRoute([$filename . '/' . $method]);
                    $url = "";
                    echo "$className::$method: $url\n";
                }
            }
        }

        return ExitCode::OK;
    }
}
