<?php 

  $instructions = !empty($variables['data']['parent']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['parent']['instructions'])
      ))
    : '';

  $conversation = $variables['data']['parent']['node'];
  $conversation_title = $conversation->title;
  
  $conversation_turns = $variables['data']['children'];

?>

\subsubsection{<?php echo $conversation_title ?>}
<?php echo $instructions ?>
<?php foreach ($conversation_turns as $turn_index => $conversation_turn): ?>
<?php echo theme('olctex_bilingual_conversation', array('data' => 
  $conversation_turn + array('turn_number' => $turn_index + 1)
)) ?>
<?php endforeach ?>
