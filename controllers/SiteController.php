<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
                'only' => ['login', 'logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
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
        return $this->redirect(['online-traffic/index']);
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

            return $this->redirect(['online-traffic/index']);

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
        return $this->redirect(['site/login']);
//        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionInit()
    {
        $auth=Yii::$app->authManager;
        $create_manager=$auth->createPermission('create_manager');
        $create_manager->description='user can access to create manager';
        $auth->add($create_manager);

        $delete_manager=$auth->createPermission('delete_manager');
        $delete_manager->description='user can access to delete manager';
        $auth->add($delete_manager);

        $update_manager=$auth->createPermission('update_manager');
        $update_manager->description='user can access to update manager';
        $auth->add($update_manager);

        $admin=$auth->createRole('admin');
        $auth->add($admin);
        $manager=$auth->createRole('manager');
        $auth->add($manager);

        $auth->addChild($admin,$create_manager);
        $auth->addChild($admin,$delete_manager);
        $auth->addChild($admin,$update_manager);

        $auth->addChild($manager,$create_manager);
        $auth->addChild($manager,$delete_manager);
        $auth->addChild($manager,$update_manager);


        $auth->assign($admin,1);
        $auth->assign($manager,2);
        $auth->assign($manager,3);

        $rule= new  component\ManagerRule;
        $auth->add($rule);

        $updateOwnManager=$auth->createPermission('updateOwnManager');
        $updateOwnManager->description='manager can update own Manager Profile';
        $updateOwnManager->ruleName=$rule->name;
        $auth->add($updateOwnManager);

        $auth->addChild($updateOwnManager,$update_manager);
        $auth->addChild($manager,$updateOwnManager);

    }
}
