<?php

namespace backend\modules\widget\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WidgetCarouselItem;

/**
 * CarouselItemSearch represents the model behind the search form about `common\models\WidgetCarouselItem`.
 */
class CarouselItemSearch extends WidgetCarouselItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'carousel_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['base_url', 'path', 'asset_url', 'type', 'url', 'caption'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($carousel_id)
    {
        $query = WidgetCarouselItem::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere([
            'carousel_id' => $carousel_id,
        ]);

        return $dataProvider;
    }
}
