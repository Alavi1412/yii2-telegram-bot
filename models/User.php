<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $created
 * @property string $modified
 * @property string $last_active
 * @property string $level
 * @property string $helper
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['created', 'modified', 'last_active'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 256],
            [['level', 'helper'], 'string', 'max' => 25],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'created' => 'Created',
            'modified' => 'Modified',
            'last_active' => 'Last Active',
            'level' => 'Level',
            'helper' => 'Helper'
        ];
    }

    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    public $found = false;

    // Initialize the user with this function instead of constructor
    public static function withID($user_id)
    {
        $instance = new self();
        $user_found = User::find()
            ->where(['user_id' => $user_id])
            ->one();
        $instance->user_id = $user_id;
        if ($user_found != null) {
            $instance->found = true;
            $instance->created = $user_found['created'];
            $instance->modified = $user_found['modified'];
            $instance->last_active = $user_found['last_active'];
            $instance->level = $user_found['level'];
            $instance->helper = $user_found['helper'];
        }
        return $instance;
    }
    /**
     * @param $text => MESSAGE
     * @param null $status => DO you want ("keyboard" or "button") a keyboard or not (false or null)
     * @param null $keyboard_data => the array data you should put in buttons or keyboards
     *
     * @return \yii\httpclient\Response => Response from telegram
     */
    public function sendMessage($text, $status = null, $keyboard_data = null)
    {
        $data = [
            'text' => $text,
            'chat_id' => $this->user_id,
            'disable_web_page_preview' => true
        ];
        if ($status == null || $status == false) {
            return TelegramRequest::methods('sendMessage', $data);
        }
        if ($status == "button") {
            $data['reply_markup'] = json_encode(['inline_keyboard' => $keyboard_data]);
        } elseif ($status == "keyboard") {
            $data['reply_markup'] = json_encode(['keyboard' => $keyboard_data,
                'resize_keyboard' => true,
                'one_time_keyboard' => true]);
        }
        return TelegramRequest::methods('sendMessage', $data);
    }
    public function sendDocument($document)
    {
        $data = [
            'document' => $document,
            'chat_id' => $this->user_id
        ];
        return TelegramRequest::methods('sendDocument', $data);
    }
    public function setLevel($level)
    {
        $this->level = $level;
        $model = User::find()->where([
            'user_id' => $this->user_id
        ])
            ->one();
        $model->level = $level;
        if ($model->save())
            return [
                "ok" => true
            ];
        else
            return [
                "ok" => false,
                "error" => $model->errors
            ];
    }
    public function setName($name, $last_name = null)
    {
        $this->first_name = $name;
        $this->last_name = $last_name;
        $model = User::find()->where([
            'user_id' => $this->user_id
        ])
            ->one();
        $model->first_name = $name;
        if ($model->save())
            return [
                "ok" => true
            ];
        else
            return [
                "ok" => false,
                "error" => $model->errors
            ];
    }

    public function error($code)
    {
        return $this->sendMessage(translates::$strings['something_went_wring'] . $code,
            'keyboard',
            translates::$main_menu);
    }

    public function setHelper($helper)
    {
        $this->helper = $helper;
        $model = User::find()->where([
            'user_id' => $this->user_id
        ])
            ->one();
        $model->helper = $helper;
        if ($model->save()) {
            return [
                "ok" => true
            ];
        } else {
            return [
                "ok" => false,
                "result" => $model->errors
            ];
        }
    }
    public function emptyFields()
    {
        // These are typical fields for users. In this part, we empty them to avoid any mistake while using the model
//        $this->helper = null;
//        $this->instagram = null;
//        $this->telegram = null;
//        $this->web = null;
        $model = User::find()->where([
            'user_id' => $this->user_id
        ])
            ->one();
        // These are typical fields for users
//        $model->helper = null;
//        $model->telegram = null;
//        $model->instagram = null;
//        $model->web = null;
        if ($model->save()) {
            return [
                "ok" => true,
                "token" => $model->hash
            ];
        } else {
            return [
                "ok" => false,
                "result" => $model->errors
            ];
        }
    }
}