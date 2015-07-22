<?php

	/**
	* @property ActiveRecordlogBehavior $logBehavior
	*/
	class InvalidLOGException_log extends CException
	{
		/**
		* @var ActiveRecordlogBehavior
		*/
		protected  $_logBehavior;
		function getlogBehavior() { return $this->_logBehavior; }

		function __construct(LogCBehavior $logBehavior, $expectedLOG=null)
		{
			$this->logBehavior = $logBehavior;

			$msg = sprintf('Invalid LOG value for %s. The current is "%s".', get_class($logBehavior->getOwner()), $logBehavior->getOwner()->{$logBehavior->logField});
			if (!empty($expectedLOG)) $msg .= ' Expected value is "'.$expectedLOG.'"';

			parent::__construct($msg, 0);
		}
	}

	/**
	* Class này phục vụ việc lấy mã LOG cho một ActiveRecord cụ thể. Thuật toán lấy như sau :
	* 	1. ActiveRecord sẽ cấu hình một danh sách các field quan trọng mà sẽ lấy LOG trên đó {@link $logFields}
	* 	2. ActiveRecord sẽ cấu hình một mã bí mật để lấy LOG {@link $logSecretKey}
	* 	3. Các field quan trọng sẽ được ghép lại thành 1 xâu theo thứ tự config, sau đó ghép thêm mã bí mật vào cuối và lấy mã băm theo thuật toán md5
	*
	* @property string $logField Field được update giá trị LOG
	* @property string[] $logFields Danh sách các Field để tạo LOG
	* @property string $fieldsFormation Format sprintf cac field để tính LOG
	* @property string $_log giá trị mã LOG
	* @property string $logSecretKey Mã bí mật để lấy tạo ra LOG
	*
	* @author Tarzan <hocdt85@gmail.com>
	*/
	class LogCBehavior extends CActiveRecordBehavior
	{
		/**
		* Array config format cho Field để đảm bảo tạo CRC toàn vẹn! Mặc định là str
		*
		* @var string[]
		* array('fieldName'=>'formation') # that used by sprintf
		*/
		public $fieldsFormation = array();

		/**
		* List Array các field đưa vào CRC
		*
		* @var string[]
		*/
		protected $_logFields = array();

		function getlogFields() { return $this->_logFields; }
		function setlogFields($v) { $this->_logFields = $v; }

		/**
		* Tên field để Save crc
		*
		* @var mixed
		*/
		public $logField = 'log';

		/**
		* Key bí mật để mã hóa cùng dữ liệu field bảo vệ
		*
		* @var string
		*/
		public $logSecretKey = '';

		/**
		* Email manage
		*
		* @var string
		*/
		public $email_manage_edit = '';



		/**
		* Field sẽ lock khi có lỗi CRC
		*
		* @var string[]
		*/
		public $lockedField = array();

		/**
		* Giá trị CRC
		*
		* @var mixed
		*/
		public $_log = null;
		/**
		* get CRC of the current object
		*
		* @return string
		*/
		function getLog($ar = null)
		{
			if(is_null($ar)) $ar = $this->getOwner();

			if (!isset($this->_log)) {
				$value = array();

				$fields = $this->getlogFields();
				foreach ($fields as $field){
					$v = $ar->$field;
					$value[$field]= isset($this->fieldsFormation[$field])
					? sprintf($this->fieldsFormation[$field], $v): $v;
				}


				//$value .= $this->logSecretKey;
				$this->_log = json_encode($value);
			}

			return $this->_log;
		}

		/**
		* Get giá trị CRC thực của AR hiện tại trước khi Update CRC mới
		*
		* @return string
		*/
		function getLogBeforeUpdate()
		{
			$ar = $this->owner->findByPk($this->owner->getPrimaryKey());

			//Reset de tinh lai theo value hien tai AR
			$this->_resetLog();

			return $this->getLog($ar);
		}

		/**
		* Tự động attack vào event after_save của AR để update CRC
		*
		* @param mixed $event
		*/
		function afterSave($event)
		{
			$this->updateLOG();
		}

		/**
		* Tự động attack vào event after_save của AR để update CRC
		*
		* @param mixed $event
		*/
		function beforeSave($event)
		{
			//$this->validateLOG();
		}

		/**
		* Reset CRC sau khi Lock
		*
		*/
		function renewLOG()
		{
			$uLog = $this->getLogBeforeUpdate();

			if (!$this->owner->updateByPk($this->owner->getPrimaryKey(),array($this->logField=>$uLog)))
				throw new Exception($this->owner->getError($logField),403);
		}

		/**
		* Function check xem CRC có toàn vẹn không
		*/
		protected function validateLOG()
		{
			$activeRecordLOG = $this->owner->{$this->logField};

			//Reset LOG để get LOG theo giá trị bằng các Fields
			$realLOG = $this->getLogBeforeUpdate();

			//Nếu LOG không toàn vẹn => Lock AR
			if($realLOG !== $activeRecordLOG && !empty($activeRecordLOG)){
				$this->updateLOGError();
				throw new InvalidLOGException_log($this, $realLOG);
			}
		}

		function updateLOGError()
		{
			if(isset($this->lockedField) && !empty($this->lockedField) && is_array($this->lockedField)){
				/**
				* @var Accounts
				*/
				$conn = $this->getOwner();
				$cmd = $conn->dbConnection->createCommand()->update($conn->tableName(),$this->lockedField,'`id`=:id',array(':id'=>$conn->id));

				if (!$cmd) {
					throw new CHttpException(400,'Can not update on LOG Error');
				}
			}
		}

		/**
		* Function Update CRC sau event after_save
		*/
		protected function updateLOG()
		{
			//Reset de tinh lai theo LOG After Save
			$this->_resetLog();

			//Update LOG
			$log = new CDbExpression('CONCAT(IFNULL(`log`, ""),:email, CURRENT_TIMESTAMP, "\n", :log, "\n--\n")', array(':log'=>"=>".$this->getLog(),':email'=> $this->email_manage_edit."  "));
			$this->owner->updateByPk($this->owner->getPrimaryKey(),array($this->logField=>$log));
		}

		/**
		* clear current value of the crc
		*
		*/
		protected function _resetLog()
		{
			if(isset($this->_log))
				$this->_log = null;
		}

		public function showLog()
		{
			return str_replace("\n", "<br />", $this->owner->{$this->logField});
		}
}