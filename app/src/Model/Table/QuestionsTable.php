<?php

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * Questions Model
 */
class QuestionsTable extends Table
{

    /**
     * @inheritdoc
     */
    public function initialize(array $config)
    {

        parent::initialize($config);

        $this->setTable('questions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Answers', [
            'foreignKey' => 'question_id'
        ]);
    }
}










?>