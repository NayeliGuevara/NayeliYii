<?php

namespace app\controllers;

use app\models\Prestamo;
use app\models\PrestamoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrestamoController implements the CRUD actions for Prestamo model.
 */
class PrestamoController extends Controller
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
     * Lists all Prestamo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PrestamoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Prestamo model.
     * @param int $idprestamo Idprestamo
     * @param int $libro_idlibro Libro Idlibro
     * @param int $usuario_idusuario Usuario Idusuario
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idprestamo, $libro_idlibro, $usuario_idusuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($idprestamo, $libro_idlibro, $usuario_idusuario),
        ]);
    }

    /**
     * Creates a new Prestamo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Prestamo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idprestamo' => $model->idprestamo, 'libro_idlibro' => $model->libro_idlibro, 'usuario_idusuario' => $model->usuario_idusuario]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Prestamo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idprestamo Idprestamo
     * @param int $libro_idlibro Libro Idlibro
     * @param int $usuario_idusuario Usuario Idusuario
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idprestamo, $libro_idlibro, $usuario_idusuario)
    {
        $model = $this->findModel($idprestamo, $libro_idlibro, $usuario_idusuario);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idprestamo' => $model->idprestamo, 'libro_idlibro' => $model->libro_idlibro, 'usuario_idusuario' => $model->usuario_idusuario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Prestamo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idprestamo Idprestamo
     * @param int $libro_idlibro Libro Idlibro
     * @param int $usuario_idusuario Usuario Idusuario
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idprestamo, $libro_idlibro, $usuario_idusuario)
    {
        $this->findModel($idprestamo, $libro_idlibro, $usuario_idusuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Prestamo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idprestamo Idprestamo
     * @param int $libro_idlibro Libro Idlibro
     * @param int $usuario_idusuario Usuario Idusuario
     * @return Prestamo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idprestamo, $libro_idlibro, $usuario_idusuario)
    {
        if (($model = Prestamo::findOne(['idprestamo' => $idprestamo, 'libro_idlibro' => $libro_idlibro, 'usuario_idusuario' => $usuario_idusuario])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
