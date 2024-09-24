<?php

namespace app\models;
use yii\base\Model;
use yii\data\ActiveDataProvider;

use Yii;

/**
 * This is the model class for table "{{%doctors}}".
 *
 * @property integer $id
 * @property string $th_title
 * @property string $en_title
 * @property integer $service_id
 * @property integer $location
 * @property string $th_image
 * @property string $en_image
 * @property integer $show_first
 * @property integer $index_weight
 * @property integer $active
 * @property integer $update_time
 * @property integer $create_time
 * @property string $line
 * @property string $mobile
 * @property string $image_schedule_th
 * @property string $image_schedule_en
 */
class DoctorsSearch extends Doctors
{

    public function rules()
    {
        return [
            [['th_title', 'en_title', 'th_image', 'en_image', 'line', 'mobile', 'image_schedule_th', 'image_schedule_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function search($params)
    {
        $query = Doctors::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'th_title', $this->th_title])
            ->andFilterWhere(['like', 'en_title', $this->en_title]);

        return $dataProvider;
    }
}