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
	
	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $users = [
		'name' => 'required|min_length[3]',
		'password' => 'required|min_length[8]',
		'email' => 'required|valid_email|is_unique[users.email]',
		'phone' =>  'required|numeric|min_length[9]|max_length[13]|is_unique[users.phone]'
	];
	
	public $create_users = [
		'name' => 'required|min_length[3]',
		'password' => 'required|min_length[8]',
		'confirm_password' => 'required|min_length[8]|matches[password]',
		'email' => 'required|valid_email|is_unique[users.email]',
		'phone' =>  'required|numeric|min_length[9]|max_length[13]|is_unique[users.phone]'
	];
}
