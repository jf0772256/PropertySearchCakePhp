<?php

	namespace App\Form;

	use Cake\Form\Form;
	use Cake\Form\Schema;

    class PropertySearchForm extends Form
    {
	    protected function _buildSchema(Schema $schema): Schema
	    {
		    return $schema->addField('beds', ['type'=>'select', 'options'=>['Select Beds','studio','1+ beds','2+ beds','3+ beds','4+ beds','5+ beds','6+ beds']])
			    ->addField('baths', ['type' => 'select', 'options'=>['Select Baths','1+ baths','2+ baths','3+ baths','4+ baths','5+ baths','6+ baths']])
			    ->addField('price', ['type' => 'select', 'options'=>['Select Price Range','under 200k', '200k-500k', '500k-1m', '>1 mil']]);
	    }
		protected function _execute(array $data): bool
	    {
		    return count($data) > 0;
	    }
	}
