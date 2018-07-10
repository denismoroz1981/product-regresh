<?php

namespace frontend\controllers;

use common\models\Comments;
use Yii;
use common\models\Offers;
use common\models\OffersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\data\ActiveDataProvider;

/**
 * OffersController implements the CRUD actions for Offers model.
 */
class OffersController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Offers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OffersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('all', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
           'offers' => $dataProvider,
        ]);

        /*$offers=Offers::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $offers,
            'pagination' => [
                'pageSize'=> 10,
                //'defaultPageSize'=> 10,
            ],
            'sort'=> [
                'defaultOrder'=>[
                    'rooms_count'=>SORT_DESC
                ]
            ],
        ]);
        return $this->render('all',['dataProvider'=>$dataProvider]);*/


    }

    /**
     * Displays a single Offers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Offers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Offers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->admin_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Offers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->admin_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Offers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Offers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Offers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Offers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionOne($url)
    {


        if ($offers=Offers::find()->andWhere(['admin_id'=>$url])->one()) {
            $commentForm = new Comments();
            $comments = $offers->comments;

            return $this->render('one',['offers'=>$offers,'comments'=>$comments,
            'commentForm'=>$commentForm]);}
        throw new NotFoundHttpException("Ups, no such offer!");
    }

    public function actionComment($admin_id) {

        $commentForm = new Comments();
        if(Yii::$app->request->isGet) {
            $commentForm->load(Yii::$app->request->get());
            if ($commentForm->saveComment($admin_id)) {
               echo 'Saved';
                return $this->redirect(['offers/one','url'=>$admin_id]);
            } else {
                echo 'Not saved';
            }
        } else {echo 'No GET';}

    }





}
