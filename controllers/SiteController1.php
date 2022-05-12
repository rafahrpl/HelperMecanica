<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\RegisterForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $RegisterForm = new RegisterForm();
        if ($RegisterForm->load(Yii::$app->request->post())) {
            
            Yii::$app->session->setFlash('FormSubmitted');
            return $this->render('report', [
                'model' => $RegisterForm,
            ]);
            //return $this->refresh();

        } else {

            return $this->render('index', [
                'model' => $RegisterForm,
            ]);

        }
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionReport()
    {
        return $this->render('report');
    }

}
