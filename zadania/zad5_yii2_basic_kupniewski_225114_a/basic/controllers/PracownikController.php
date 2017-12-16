<?php

namespace app\controllers;

use Yii;
use app\models\Pracownik;
use app\models\PracownikSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Auto;
use yii\data\ActiveDataProvider;

/**
 * PracownikController implements the CRUD actions for Pracownik model.
 */
class PracownikController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pracownik models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PracownikSearch();

        $dataProvider = new ActiveDataProvider([
        'query' => Pracownik::find(),
        'sort' => ['attributes' => ['nazwisko','imie']]
        ]);

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pracownik model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pracownik model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pracownik();

        $auto = Auto::find()
            ->orderBy('auto_id')
            ->all();
        $auto = ArrayHelper::map($auto,'model','marka');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pracownik_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                //'auto' => $auto,
            ]);
        }
    }

    /**
     * Updates an existing Pracownik model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $auto = Auto::find()
            ->orderBy('marka')
            ->all();
        $auto = ArrayHelper::map($auto,'auto_id','marka');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pracownik_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                //'auto' => $auto,
            ]);
        }
    }

    /**
     * Deletes an existing Pracownik model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pracownik model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pracownik the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pracownik::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
