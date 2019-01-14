<?php

namespace app\controllers;

use app\models\TelegramRequest;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    /**
     * @var User
     */
    private $user;
    private $message;


    public function actionIndex()
    {
        Yii::$app->response->format = 'json';
        $data = json_decode(Yii::$app->request->getRawBody(), true);
        if (isset($data['message'])) {
            $Received = $data['message'];
            $this->message = $Received;
        } else {
            $Received = $data['callback_query'];
            $this->message = $Received;
            $this->message['text'] = $Received['data'];
            // Edit this part and the function's source to modify the answerCallbackQuery if you want more parameters
            TelegramRequest::answerCallbackQuery([
                "callback_query_id" => $data['callback_query']['id']
            ]);
        }
        return $this->checkUser($Received['from']['id'] );
    }

    private function checkUser($user_id)
    {
        $User = User::withID($user_id);
        if (!$User->found) {
            // Do what you want with unknown User
            return false;
        }
        else {
            // Do what you want with known User
            $this->user = $User;
            return $this->levelProcess();
        }
    }

    private function levelProcess()
    {
        return true;
    }
}
