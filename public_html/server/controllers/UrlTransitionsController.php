<?php

namespace app\controllers;

use app\models\UrlTransitions;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UrlTransitionsController implements the CRUD actions for UrlTransitions model.
 */
class UrlTransitionsController extends Controller
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
     * Lists all UrlTransitions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UrlTransitions::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id_url_transitions' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UrlTransitions model.
     * @param int $id_url_transitions Id Url Transitions
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_url_transitions)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_url_transitions),
        ]);
    }

    /**
     * Creates a new UrlTransitions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UrlTransitions();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_url_transitions' => $model->id_url_transitions]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UrlTransitions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_url_transitions Id Url Transitions
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_url_transitions)
    {
        $model = $this->findModel($id_url_transitions);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_url_transitions' => $model->id_url_transitions]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UrlTransitions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_url_transitions Id Url Transitions
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_url_transitions)
    {
        $this->findModel($id_url_transitions)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UrlTransitions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_url_transitions Id Url Transitions
     * @return UrlTransitions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_url_transitions)
    {
        if (($model = UrlTransitions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
