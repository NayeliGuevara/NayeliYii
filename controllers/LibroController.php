<?php

namespace app\controllers;

use app\models\Libro;
use app\models\LibroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibroController implements the CRUD actions for Libro model.
 */
class LibroController extends Controller
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
     * Lists all Libro models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LibroSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Libro model.
     * @param int $idlibro Idlibro
     * @param int $autor_idautor Autor Idautor
     * @param int $genero_idgenero Genero Idgenero
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idlibro, $autor_idautor, $genero_idgenero)
    {
        return $this->render('view', [
            'model' => $this->findModel($idlibro, $autor_idautor, $genero_idgenero),
        ]);
    }

    /**
     * Creates a new Libro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Libro();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idlibro' => $model->idlibro, 'autor_idautor' => $model->autor_idautor, 'genero_idgenero' => $model->genero_idgenero]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Libro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idlibro Idlibro
     * @param int $autor_idautor Autor Idautor
     * @param int $genero_idgenero Genero Idgenero
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idlibro, $autor_idautor, $genero_idgenero)
    {
        $model = $this->findModel($idlibro, $autor_idautor, $genero_idgenero);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idlibro' => $model->idlibro, 'autor_idautor' => $model->autor_idautor, 'genero_idgenero' => $model->genero_idgenero]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Libro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idlibro Idlibro
     * @param int $autor_idautor Autor Idautor
     * @param int $genero_idgenero Genero Idgenero
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idlibro, $autor_idautor, $genero_idgenero)
    {
        $this->findModel($idlibro, $autor_idautor, $genero_idgenero)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Libro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idlibro Idlibro
     * @param int $autor_idautor Autor Idautor
     * @param int $genero_idgenero Genero Idgenero
     * @return Libro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idlibro, $autor_idautor, $genero_idgenero)
    {
        if (($model = Libro::findOne(['idlibro' => $idlibro, 'autor_idautor' => $autor_idautor, 'genero_idgenero' => $genero_idgenero])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
