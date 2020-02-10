<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
//add by thinhlv

echo lang('language_key');
// Outputs: Language line

echo lang('language_key', 'form_item_id', array('class' => 'myClass'));
// Outputs: <label for="form_item_id" class="myClass">Language line</label>

