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
            'class' => AccessControl::class,
            'only' => ['index', 'logout'], // "index"
            'rules' => [
                [
                    'actions' => ['index', 'logout'],
                    'allow' => true,
                    'roles' => ['@'], // Apenas usuários logados
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::class,
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
        $relatorio = Yii::$app->db->createCommand("
        SELECT 
            v.id_vinho,
            v.nome AS nome_vinho,
            v.safra,
            v.preco,
            v.teor,
            v.qtd_estoque,
            tv.descricao AS tipo,
            b.nome AS bodega,
            f.nome AS fornecedor
        FROM vinho v
        LEFT JOIN tipo_vinho tv ON v.id_tipo_vinho = tv.id_tipo_vinho
        LEFT JOIN bodega b ON v.id_bodega = b.id_bodega
        LEFT JOIN fornecedor_vinho fv ON v.id_vinho = fv.id_vinho
        LEFT JOIN fornecedor f ON fv.id_fornecedor = f.id_fornecedor
        ORDER BY v.nome
    ")->queryAll();

        return $this->render('index', [
            'relatorio' => $relatorio,
        ]);
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
            return $this->redirect(['site/index']); // Redireciona diretamente para a home
        }

        $model->senha = '';
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
}
