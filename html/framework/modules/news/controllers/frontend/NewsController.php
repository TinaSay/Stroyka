<?php

namespace app\modules\news\controllers\frontend;

use app\modules\news\models\News;
use app\modules\news\models\NewsSearch;
use krok\system\components\frontend\Controller;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

/**
 * Class NewsController
 *
 * @package app\modules\news\controllers\frontend
 */
class NewsController extends Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {

        $query = News::find()->where(['hidden' => News::HIDDEN_NO]);

        if (\Yii::$app->request->get('filter')) {
            $term = \Yii::$app->request->get('term', '');
            if (!empty($term))
                $query->andWhere(['or', ['like', 'title', $term], ['like', 'text', $term]]);

            $dateFrom = \Yii::$app->request->get('dateFrom', '');
            $dateTo = \Yii::$app->request->get('dateTo', '');

            if (!empty($dateFrom) && !empty($dateTo))
                $query->andWhere(['between', 'date', date('Y-m-d', strtotime($dateFrom)), date('Y-m-d', strtotime($dateTo))]);

        }


        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['createdAt' => SORT_DESC])
            ->all();

        $topNewslist = array_slice($models, 0, 8);
        $bottomNewslist = array_slice($models, 8, 4);

        return $this->render('index', [
            'topNewslist' => $topNewslist,
            'bottomNewslist' => $bottomNewslist,
            'pagination' => $pages,
            'modelSearch' => new NewsSearch()
        ]);
    }

    /**
     * @param $id
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);

    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id, 'hidden' => News::HIDDEN_NO])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
