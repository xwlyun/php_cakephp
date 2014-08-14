<?php

class User extends AppModel
{
	public $name = 'User';

	public $validate = array(
		'username' => array(
			'rule' => 'notEmpty'
		),
		'pwd' => array(
			'rule' => 'notEmpty'
		)
	);
}