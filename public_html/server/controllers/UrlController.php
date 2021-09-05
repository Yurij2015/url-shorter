<?php

namespace app\controllers;

use app\models\Url;
use app\models\UrlTransitions;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UrlController implements the CRUD actions for Url model.
 */
class UrlController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Url models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Url::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idurl' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Url model.
     * @param int $id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewUrl($shorter_url)
    {
        $short_url = Url::findOne(['shorter_url' => $shorter_url]);

        $transition_count = UrlTransitions::find()
            ->where(['url_idurl' => $short_url['idurl']])
            ->count();

        if ($transition_count >= $short_url['redirect_limit'] && $short_url['redirect_limit'] !== 0) {
            return $this->render('404');
        }

        $url_life = strtotime(date("Y-m-d H:i:s")) - strtotime($short_url['time_create']);
        $url_life = $url_life / 3600;
        if ($url_life > $short_url['shorter_url_lifetime']) {
            return $this->render('404');
        }

        $transition = new UrlTransitions();
        $transition->url_idurl = $short_url['idurl'];
        $transition->entry_time = date("Y-m-d H:i:s");;
        $transition->save();

        return $this->redirect($short_url['url']);
    }

    /**
     * Creates a new Url model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Url();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->idurl]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Finds the Url model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Id
     * @return Url the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idurl)
    {
        if (($model = Url::findOne($idurl)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
