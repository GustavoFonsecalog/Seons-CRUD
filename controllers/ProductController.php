<?php

namespace app\controllers;

use app\models\Product;
use yii\rest\ActiveController;
use Yii;
use yii\filters\Cors;

class ProductController extends ActiveController
{
    // Método behaviors que permite requisições CORS
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // Configuração para permitir requisições CORS
        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                'Origin' => ['http://localhost:4200'], // Permite o front-end Angular
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'], // Inclui OPTIONS para preflight
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Allow-Headers' => ['Content-Type', 'Authorization', 'X-Requested-With'],
                'Access-Control-Max-Age' => 3600, // Duração da resposta preflight em cache
            ],
        ];

        return $behaviors;
    }

    // Define o model da API para 'Product'
    public $modelClass = 'app\models\Product';

    // Desabilitar a ação delete padrão
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete']);
        return $actions;
    }

    // Método para retornar categorias
    public function actionCategories()
    {
        return [
            ['id' => 1, 'name' => 'Esportes'],
            ['id' => 2, 'name' => 'Eletrônicos'],
            ['id' => 3, 'name' => 'Lazer'],
        ];
    }
    
    // Método para criar um produto
    public function actionCreate()
    {
        Yii::debug(Yii::$app->request->post(), __METHOD__);  // Loga os dados recebidos para inspeção
    
        $model = new Product();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $model;
        }
        
        Yii::debug($model->getErrors(), __METHOD__);  // Loga os erros de validação para inspeção
        return $model->getErrors();
    }

    // Método para atualizar um produto
    public function actionUpdate($id)
    {
        dd('teste');
        $model = Product::findOne($id);
        if ($model) {
            $model->load(Yii::$app->request->post());
            if ($model->save()) {
                return $model;
            }
            return $model->getErrors();
        }
        throw new NotFoundHttpException("Product not found.");
    }

    // Método para deletar um produto
    public function actionDelete($id)
    {
        $model = Product::findOne($id);
        if ($model) {
            $model->delete();
            return ['status' => 'Product deleted'];
        }
        throw new NotFoundHttpException("Product not found.");
    }
}
