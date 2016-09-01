<?php namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\db\Query;
use yii\db\Expression;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TbSource;

class SiteController extends Controller
{

    /**
     * @inheritdoc
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
     * @inheritdoc
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
     * @return string
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
        return $this->render('login', [
                'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
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

    public function actionOrm()
    {
        $query = TbSource::find()
            ->distinct()
            ->joinWith('rels', true, 'INNER JOIN')
            ->where(['like', 'title', 'title 1%', false]);

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        return $this->render('orm', ['dataProvider' => $dataProvider]);
    }

    public function actionBuilder()
    {
        
        $subQuery = (new Query)
            ->distinct()
            ->select('cx')
            ->from('tb_rel');
        
        $query = (new Query)
            ->from('tb_source ts')
            ->innerJoin(['tt' => $subQuery], 'ts.cx = tt.cx')
            ->where("ts.title like 'title 1%'");
        
        $dataProvider = new SqlDataProvider([
            'sql' => $query->createCommand()->getSql(),
            'totalCount' => $query->count(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        $cxPage = array_map(function($val) {return $val['cx'];}, $dataProvider->getModels());
        $ndcs = (new Query)
            ->select([
                'cx',
                new Expression("GROUP_CONCAT(ndc SEPARATOR ', ') as ndcs")
            ])
            ->from('tb_rel')
            ->groupBy('cx')
            ->where(['cx' => $cxPage])
            ->indexBy('cx')
            ->all();
        
        return $this->render('builder', [
            'dataProvider' => $dataProvider,
            'ndcs' => $ndcs
        ]);
    }
}
