<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $users = [
		'name' => [
			'rules' => 'required|min_length[3]',
			'errors' => [
				'required' => 'you must fill your name.',
				'min_length' => 'the minimum character is 3 or more.'
			]
		],
		'password' => [
			'rules' => 'required|min_length[8]',
			'errors' => [
				'required' => 'you must fill your password.',
				'min_length' => 'the minimum character is 8 or more.'
			]
		],
		'email' => [
			'rules' => 'required|valid_email|is_unique[users.email]',
			'errors' => [
				'required' => 'you must fill your email.',
				'valid_email' => 'you must fill the valid email.',
				'is_unique' => 'email already exists'
			]
		],
		'phone' => [
			'rules' => 'required|numeric|min_length[9]|max_length[13]|is_unique[users.phone]',
			'errors' => [
				'required' => 'you must fill your phone number.',
				'min_length' => 'your phone number not valid.',
				'max_length' => 'your phone number not valid.',
				'is_unique' => 'phone number already exists'
			]
		]

	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
