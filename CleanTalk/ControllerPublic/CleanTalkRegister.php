<?php

class CleanTalk_ControllerPublic_CleanTalkRegister extends XFCP_CleanTalk_ControllerPublic_CleanTalkRegister {

    protected function _getRegisterFormResponse(array $fields, array $errors = array()) {
        $options = XenForo_Application::getOptions();
	if ($options->get('cleantalk', 'enabled_reg')) {
            XenForo_Application::getSession()->set('ct_submit_register_time', time());
            $field_name = CleanTalk_Base_CleanTalk::getCheckjsName();
            $ct_check_def = CleanTalk_Base_CleanTalk::getCheckjsDefaultValue();
            setcookie($field_name, $ct_check_def, 0, '/');
        }
	return parent::_getRegisterFormResponse($fields, $errors);
    }

}
