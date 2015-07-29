<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\User;
use app\models\PageUsers;
use yii\data\Pagination;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'login', 'users'],
                'rules' => [
                    [
                        'actions' => ['logout','users'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],

                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    return $action->controller->redirect('index');
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get','post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegister()
    {
        $model = new RegisterForm();

        if($model->load(Yii::$app->request->post()) && $model->validate())
        {

            if($model->register())
            {
                return $this->goHome();
            }
            else
            {
                Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации');
                Yii::error('Ошибка при регистрации');
                return $this->refresh();
            }
        }
        return $this->render('register', ['model' => $model]);
    }

    public function actionUsers()
    {

        $params = Yii::$app->request->get();

        $model = new PageUsers();
        $allUsers = $model->PageUser($params);

        $pages = new Pagination(['totalCount' => $model->countUser,'defaultPageSize' => $model->pageSize, 'forcePageParam' => false]);

        if ($allUsers) {
            return $this->render('users', [
                'allUsers' => $allUsers,
                'pages' => $pages,
                'orderby' => $model->sort,
                'currentPage' => $model->currentPage,
                'arrow' => $model->arrow,
            ]);
        }
    }

    public function actionPages()
    {
        return $this->render('users');
    }


    public function actionLogin()
    {

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('users');
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    
}
