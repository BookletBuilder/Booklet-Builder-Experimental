<?php $node = $variables['data']['parent']['node']; ?>

% Title
\textbf{<?php echo $node->title ?>}

% Subtitle
{\setlength{\parskip}{0pt}
<?php if (array_key_exists('und', $node->field_translation)): ?> 
\textit{<?php echo $node->field_translation['und'][0]['safe_value'] ?>}
<?php endif; ?>
}

% Picture
<?php 
$picture_file = isset($node->field_picture['und'][0])
  ? $node->field_picture['und'][0]
  : array();
?>
<?php if (!empty($picture_file)): ?>
<?php echo theme('olctex_picture', array('data' => array(
  'file' => $picture_file,
  'style_name' => 'thumbnail',
))) ?>
<?php endif; ?>

% Instructions
<?php 
  $instructions = !empty($variables['data']['parent']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['parent']['instructions'])
      ))
    : '';
?>
<?php echo $instructions ?>

% Turns
<?php $conversation_turns = $variables['data']['children']; ?>
<?php foreach ($conversation_turns as $turn_index => $conversation_turn): ?>
<?php echo theme('olctex_bilingual_conversation', array('data' => 
  $conversation_turn + array('turn_number' => $turn_index + 1)
)) ?>
<?php endforeach ?>
\bigskip
