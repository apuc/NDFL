<?php

    namespace common\models\db;

    use Yii;
    use yii\base\NotSupportedException;
    use yii\behaviors\TimestampBehavior;
    use yii\web\IdentityInterface;

    /**
     * This is the model class for table "user".
     *
     * @property integer $id
     * @property string $email
     * @property string $password
     * @property string $name
     * @property string $surname
     * @property string $patronymic
     * @property string $salt
     * @property string $status
     * @property integer $created_at
     * @property integer $updated_at
     * @property string $image
     * @property string $user_type
     */
    class User extends \yii\db\ActiveRecord implements IdentityInterface
    {
        /**
         * @inheritdoc
         */
        public static function tableName()
        {
            return '{{%user}}';
        }

        /**
         * @inheritdoc
         */
        public function rules()
        {
            return [
                [['email', 'password', 'name', 'surname', 'salt', 'status', 'created_at', 'updated_at', 'user_type'],
                 'required'],
                [['created_at', 'updated_at', 'user_type'], 'integer'],
                [['email'], 'string', 'max' => 80],
                [['password'], 'string', 'max' => 128],
                [['name', 'surname', 'patronymic'], 'string', 'max' => 50],
                ['salt', 'string', 'max' => 64],
                [['status'], 'integer', 'max' => 2],
                [['image'], 'string', 'max' => 255],
                [['email'], 'unique']
            ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels()
        {
            return [
                'id'                => 'ID',
                'email'             => 'Email',
                'password'          => 'Пароль',
                'name'              => 'Имя',
                'surname'           => 'Фамилия',
                'patronymic'        => 'Отчество',
                'salt'              => 'Salt',
                'status'            => 'Status',
                'created_at'       => 'Дата создания',
                'updated_at'       => 'Дата обновления',
                'verification_code' => 'Verification Code',
                'user_type'         => 'Тип пользователя',
                'image'             => 'Картинка',
            ];
        }

        public static function findIdentity($id)
        {
            return static::findOne(['id' => $id]);
        }

        public static function findByEmail($email)
        {
            return static::findOne(['email' => $email]);
        }

        public function getId()
        {
            return $this->getPrimaryKey();
        }

        public function validatePassword($password)
        {
            $currentPassword = hash_hmac('sha512', $password, $this->salt);

            if ($currentPassword == $this->password)
                return true;

            return false;
        }

        public function generatePassword($password)
        {
            $this->salt = sha1(time() . '76s3d');

            $this->password = hash_hmac('sha512', $password, $this->salt);
        }


        /**
         * Finds an identity by the given token.
         * @param mixed $token the token to be looked for
         * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
         * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
         * @return IdentityInterface the identity object that matches the given token.
         * Null should be returned if such an identity cannot be found
         * or the identity is not in an active state (disabled, deleted, etc.)
         */
        public static function findIdentityByAccessToken($token, $type = null)
        {
            // TODO: Implement findIdentityByAccessToken() method.
        }

        /**
         * Returns a key that can be used to check the validity of a given identity ID.
         *
         * The key should be unique for each individual user, and should be persistent
         * so that it can be used to check the validity of the user identity.
         *
         * The space of such keys should be big enough to defeat potential identity attacks.
         *
         * This is required if [[User::enableAutoLogin]] is enabled.
         * @return string a key that is used to check the validity of a given identity ID.
         * @see validateAuthKey()
         */
        public function getAuthKey()
        {
            // TODO: Implement getAuthKey() method.
        }

        /**
         * Validates the given auth key.
         *
         * This is required if [[User::enableAutoLogin]] is enabled.
         * @param string $authKey the given auth key
         * @return boolean whether the given auth key is valid.
         * @see getAuthKey()
         */
        public function validateAuthKey($authKey)
        {
            // TODO: Implement validateAuthKey() method.
        }
    }
