<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophnupreoperative_preoperative".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $translator_present_id
 * @property string $name_of_translator
 * @property integer $patient_verified
 * @property string $date_last_ate
 * @property string $date_last_drank
 * @property integer $consent_signed
 * @property integer $surgical_site_verified
 * @property integer $site_id
 * @property integer $iol_verified_id
 * @property string $iol_type
 * @property string $iol_size
 * @property integer $metal_in_body
 * @property string $m_comments
 * @property integer $falls_mobility
 * @property integer $removable_dental_work_present
 * @property string $d_comments
 * @property integer $hearing_aid_present
 * @property integer $patient_belongings
 * @property integer $belong_id
 * @property string $b_comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuPreoperative_PreoperativeAssessment_TranslatorPresent $translator_present
 * @property Element_OphNuPreoperative_PreOperativeAssessment_Wristband_Assignment $wristbands
 * @property OphNuPreoperative_PreoperativeAssessment_Site $site
 * @property OphNuPreoperative_PreoperativeAssessment_IolVerified $iol_verified
 * @property Element_OphNuPreoperative_PreoperativeAssessment_Falls_Assignment $fallss
 * @property Element_OphNuPreoperative_PreoperativeAssessment_Dental_Assignment $dentals
 * @property Element_OphNuPreoperative_PreoperativeAssessment_HearingAid_Assignment $hearing_aids
 * @property OphNuPreoperative_PreoperativeAssessment_Belong $belong
 */

class Element_OphNuPreoperative_PreoperativeAssessment	extends  BaseEventTypeElement
{
	public $date_last_ate_time;
	public $date_last_drank_time;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophnupreoperative_preoperative';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, translator_present_id, name_of_translator, patient_verified, date_last_ate, date_last_drank, consent_signed, surgical_site_verified, site_id, iol_verified_id, iol_type_id, iol_size_id, metal_in_body, m_comments, falls_mobility, removable_dental_work_present, d_comments, hearing_aid_present, patient_belongings, b_comments, date_last_ate_time, date_last_drank_time', 'safe'),
			array('id, event_id, translator_present_id, name_of_translator, patient_verified, date_last_ate, date_last_drank, consent_signed, surgical_site_verified, site_id, iol_verified_id, iol_type_id, iol_size_id, metal_in_body, m_comments, falls_mobility, removable_dental_work_present, d_comments, hearing_aid_present, patient_belongings, belong_id, b_comments, ', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'translator_present' => array(self::BELONGS_TO, 'OphNuPreoperative_PreoperativeAssessment_TranslatorPresent', 'translator_present_id'),
			'wristbands' => array(self::HAS_MANY, 'Element_OphNuPreoperative_PreOperativeAssessment_Wristband_Assignment', 'element_id'),
			'site' => array(self::BELONGS_TO, 'OphNuPreoperative_PreoperativeAssessment_Site', 'site_id'),
			'iol_verified' => array(self::BELONGS_TO, 'OphNuPreoperative_PreoperativeAssessment_IolVerified', 'iol_verified_id'),
			'fallss' => array(self::HAS_MANY, 'Element_OphNuPreoperative_PreOperativeAssessment_Falls_Assignment', 'element_id'),
			'dentals' => array(self::HAS_MANY, 'Element_OphNuPreoperative_PreOperativeAssessment_Dental_Assignment', 'element_id'),
			'hearing_aids' => array(self::HAS_MANY, 'Element_OphNuPreoperative_PreOperativeAssessment_HearingAid_Assignment', 'element_id'),
			'iol_type' => array(self::BELONGS_TO, 'OphNuPreoperative_PreopAssessment_IOL_Type', 'iol_type_id'),
			'iol_size' => array(self::BELONGS_TO, 'OphNuPreoperative_PreopAssessment_IOL_Size', 'iol_size_id'),
			'belongings' => array(self::HAS_MANY, 'OphNuPreoperative_PreoperativeAssessment_Belong_Assignment', 'element_id'),
			'identifiers' => array(self::HAS_MANY, 'OphNuPreoperative_PreoperativeAssessment_Identifier_Assignment', 'element_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'translator_present_id' => 'Translator present?',
			'name_of_translator' => 'Name of translator',
			'patient_verified' => 'Patient ID / wristband verified with two identifiers',
			'wristband' => 'Special attention wristband attached?',
			'date_last_ate' => 'Time last ate',
			'date_last_ate_time' => 'Time last ate',
			'date_last_drank' => 'Time last drank',
			'date_last_drank_time' => 'Time last drank',
			'consent_signed' => 'Consent signed',
			'surgical_site_verified' => 'Surgical site verified',
			'site_id' => 'Site',
			'iol_verified_id' => 'IOL verified',
			'iol_type_id' => 'IOL type',
			'iol_size_id' => 'IOL size',
			'metal_in_body' => 'Metal in body',
			'm_comments' => 'Metal in body notes',
			'falls_mobility' => 'Falls / mobility',
			'falls' => 'Falls / mobility items',
			'removable_dental_work_present' => 'Removable dental work present?',
			'dental' => 'Dental items',
			'd_comments' => 'Other dental items',
			'hearing_aid_present' => 'Hearing aid present?',
			'hearing_aid' => 'Hearing aid',
			'patient_belongings' => 'Patient belongings',
			'belong_id' => 'Belonging items',
			'b_comments' => 'Belonging notes',
			'identifiers' => 'Two identifiers',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('translator_present_id', $this->translator_present_id);
		$criteria->compare('name_of_translator', $this->name_of_translator);
		$criteria->compare('patient_verified', $this->patient_verified);
		$criteria->compare('wristband', $this->wristband);
		$criteria->compare('date_last_ate', $this->date_last_ate);
		$criteria->compare('date_last_drank', $this->date_last_drank);
		$criteria->compare('consent_signed', $this->consent_signed);
		$criteria->compare('surgical_site_verified', $this->surgical_site_verified);
		$criteria->compare('site_id', $this->site_id);
		$criteria->compare('iol_verified_id', $this->iol_verified_id);
		$criteria->compare('iol_type', $this->iol_type);
		$criteria->compare('iol_size', $this->iol_size);
		$criteria->compare('metal_in_body', $this->metal_in_body);
		$criteria->compare('m_comments', $this->m_comments);
		$criteria->compare('falls_mobility', $this->falls_mobility);
		$criteria->compare('falls', $this->falls);
		$criteria->compare('removable_dental_work_present', $this->removable_dental_work_present);
		$criteria->compare('dental', $this->dental);
		$criteria->compare('d_comments', $this->d_comments);
		$criteria->compare('hearing_aid_present', $this->hearing_aid_present);
		$criteria->compare('hearing_aid', $this->hearing_aid);
		$criteria->compare('patient_belongings', $this->patient_belongings);
		$criteria->compare('belong_id', $this->belong_id);
		$criteria->compare('b_comments', $this->b_comments);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function beforeSave()
	{
		if ($this->date_last_ate) {
			$this->date_last_ate .= ' '.$this->date_last_ate_time;
		} else {
			$this->date_last_ate = null;
		}

		if ($this->date_last_drank) {
			$this->date_last_drank .= ' '.$this->date_last_drank_time;
		} else {
			$this->date_last_drank = null;
		}

		return parent::beforeSave();
	}

	public function afterFind()
	{
		$this->date_last_ate_time = substr($this->date_last_ate,11,5);
		$this->date_last_drank_time = substr($this->date_last_drank,11,5);
	}

	public function beforeValidate()
	{
		if ($this->translator_present && $this->translator_present->name == 'Yes') {
			if (!$this->name_of_translator) {
				$this->addError('name_of_translator',$this->getAttributeLabel('name_of_translator').' cannot be blank.');
			}
		}

		if ($this->surgical_site_verified) {
			if (!$this->site) {
				$this->addError('site_id',$this->getAttributeLabel('site_id').' cannot be blank.');
			}
		}

		if ($this->iol_verified && $this->iol_verified->name == 'Yes') {
			if (!$this->iol_type) {
				$this->addError('iol_type_id',$this->getAttributeLabel('iol_type_id').' cannot be blank.');
			}
			if (!$this->iol_size) {
				$this->addError('iol_size_id',$this->getAttributeLabel('iol_size_id').' cannot be blank.');
			}
		}

		if ($this->falls_mobility) {
			if (empty($this->fallss)) {
				$this->addError('fallss','Please enter at least one fall/mobility item');
			}
		}

		if ($this->removable_dental_work_present) {
			if (empty($this->dentals)) {
				$this->addError('dentals','Please enter at least one dental item');
			}
		}

		if ($this->date_last_ate) {
			if (!preg_match('/^([0-9]{1,2}):([0-9]{2})$/',$this->date_last_ate_time,$m) || $m[1] > 23 || $m[2] > 59) {
				$this->addError('date_last_ate_time','Invalid time format for '.$this->getAttributeLabel('date_last_ate_time'));
			} else {
				$this->date_last_ate = date('Y-m-d',strtotime($this->date_last_ate)).' '.str_pad($m[1],2,"0",STR_PAD_LEFT).":".$m[2].":00";
			}
		}

		if ($this->date_last_drank) {
			if (!preg_match('/^([0-9]{1,2}):([0-9]{2})$/',$this->date_last_drank_time,$m) || $m[1] > 23 || $m[2] > 59) {
				$this->addError('date_last_drank_time','Invalid time format for '.$this->getAttributeLabel('date_last_drank_time'));
			} else {
				$this->date_last_drank = date('Y-m-d',strtotime($this->date_last_drank)).' '.str_pad($m[1],2,"0",STR_PAD_LEFT).":".$m[2].":00";
			}
		}

		if ($this->patient_belongings) {
			if (empty($this->belongings)) {
				$this->addError('belongings','Please select at least one patient belonging');
			}
		}

		if ($this->hasMultiSelectValue('belongings','Other (please specify)')) {
			if (!$this->b_comments) {
				$this->addError('b_comments',$this->getAttributeLabel('b_comments').' cannot be blank.');
			}
		}

		if ($this->patient_verified) {
			if (count($this->identifiers) != 2) {
				$this->addError('identifiers','Please select exactly 2 patient identifiers');
			}
		}

		return parent::beforeValidate();
	}
}
?>
