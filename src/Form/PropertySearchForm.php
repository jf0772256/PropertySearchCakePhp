<?php

	namespace App\Form;

	use Cake\Form\Form;
	use Cake\Form\Schema;

    class PropertySearchForm extends Form
    {
	    protected function _buildSchema(Schema $schema): Schema
	    {
		    return $schema->addField('beds', 'string')
			    ->addField('baths', 'string')
			    ->addField('price', 'string');
	    }
		protected function _execute(array $data): bool
	    {
			$populated = false;
			if (count($data) > 0 && ($data['price'] !== '' || $data['beds'] !== '0' || $data['baths'] !== '0')) $populated = true;
		    return $populated;
	    }
	}
