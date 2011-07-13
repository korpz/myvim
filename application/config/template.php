<?php
$template['active_group'] = 'default';
$template['default']['template'] = 'template.php'; 
$template['default']['regions'] = array(
  'header',
  'content',
  'footer',
); 
$template['default']['regions'] = array(
  'header',
  'title',
  'content',
  'sidebar',
  'footer',
);
$template['default']['parser'] = 'smarty_parser';
// Template will call smarty_parser::parse()

$template['default']['parser'] = 'frog_parser';
$template['default']['parser_method'] = 'frog';
// Template will call frog_parser::frog()
$template['default']['parse_template'] = TRUE;
$template['default']['regions']['header'] = array('content' => array('<h1>CI Rocks!</h1>'));
$template['default']['regions']['footer'] = array('content' => array('<p id="copyright">© Our Company Inc.</p>'));
