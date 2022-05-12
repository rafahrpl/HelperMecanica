<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegisterForm;
use app\models\Products;
use yii\data\Pagination;

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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays register page.
     *
     * @return string
     */
    public function actionRegister()
    {
        $model = new RegisterForm();
        $postData = Yii::$app->request->post();
     
        if ($model->load($postData) && $model->validate(false)) {         
            $model->save(false);     
                if (!$model->save()){
                    print_r($model->getErrors()); // this would be helpful to find problem.
                    echo "<br><br><br><br><br>MODEL NOT SAVED";
  print_r($model->getAttributes());
  print_r($model->getErrors());
                } else {
  print_r($model->getAttributes());
  print_r($model->getErrors());
                    //Yii::$app->getSession()->setFlash('success', 'Your message has been successfully recorded.');
                    Yii::$app->session->setFlash('registerFormSubmitted');
                }
            return $this->render('report', [
                'model' => $model,
            ]);
            //return $this->refresh();

        } else {

            return $this->render('register', [
                'model' => $model,
            ]);

        }
    }

    /**
     * Displays report page.
     *
     * @return string
     */
    public function actionReport()
    {
        $products = Products::find()->orderBy('name')->all();
        return $this->render('report', [
            'products' => $products,
        ]);  
    }

    /**
     * Displays report page.
     *
     * @return string
     */
    public function actionProducts()
    {
        $query = Products::find();

        $paginacao = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $products = $query->orderBy('name')
            ->offset($paginacao->offset)
            ->limit($paginacao->limit)
            ->all();

        return $this->render('products', [
            'products' => $products,
            'paginacao' => $paginacao,
        ]);
        
    }

}
