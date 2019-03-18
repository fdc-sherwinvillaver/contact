<?php  
/**
 * Form Validation
 */

$config = array(
	'api/register' => array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|min_length[5]|max_length[12]|is_unique[users.username]',
			'errors' => array(
				'required' => 'Please enter username to continue',
				'is_unique' => 'Username already exists.',
				'min_length' => 'Please enter minimum of 5 characters',
				'max_length' => 'Please enter maximum of 12 characters'
			)
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|min_length[5]|max_length[12]',
			'errors' => array(
				'required' => 'Please enter password to continue',
				'min_length' => 'Please enter minimum of 5 characters',
				'max_length' => 'Please enter maximum of 12 characters'
			)
		),
		array(
			'field' => 'confpass',
			'label' => 'confirm password',
			'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
			'errors' => array(
				'required' => 'Please enter confirm password to continue',
				'matches' => 'Password and confirm password does not match',
				'min_length' => 'Please enter minimum of 5 characters',
				'max_length' => 'Please enter maximum of 12 characters'
			)
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email|is_unique[users.email]',
			'errors' => array(
				'required' => 'Please enter confirm password to continue',
				'valid_email' => 'Please enter valid email address',
				'is_unique' => 'Email already exists.',
			)
		)
	),
	'api/login' => array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email',
			'errors' => array(
				'required' => 'Please enter email to continue',
				'valid_email' => 'Please enter valid email address',
			)
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required',
			'errors' => array(
				'required' => 'Please enter password to continue'
			)
		)
	)
);