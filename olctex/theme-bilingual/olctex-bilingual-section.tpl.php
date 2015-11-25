<?php

  $EOL = PHP_EOL;

  $section_node = $variables['data']['data']['node'];

  $section_title_args = array();
  $section_title_args['section_type'] = 'section';
  $section_title_args['heading_text'] = $section_node->field_section_name && $section_node->field_section_name['und'][0]['safe_value']
    ? $section_node->field_section_name['und'][0]['safe_value']
    : '';
  $section_title_args['subheading_text'] = $section_node->field_translation && $section_node->field_translation['und'][0]['safe_value']
    ? $section_node->field_translation['und'][0]['safe_value']
    : '';
  echo theme('olctex_section_header', $section_title_args);
  
?>

<?php 
  // PICTURE FILE
  $picture_file = isset($section_node->field_picture['und'][0])
    ? $section_node->field_picture['und'][0]
    : array();
  if (!empty($picture_file)) {
    echo theme('olctex_picture', array('data' => array(
      'file' => $picture_file,
      'style_name' => 'thumbnail',
    )));
  }
  else {
  }
  
?>



<?php $section_parts = $variables['data']['data']['section_parts'] ?>



<?php // Lesson ?>
<?php if (isset($section_parts->lesson)): ?>
\subsection {Lesson}
<?php echo theme('olctex_container', array(
  'separator' => '\bigskip\hrule\bigskip',
  'data' => _olctex_theme_multiple(
    'olctex_lesson',
    $section_parts->lesson
  )
)) ?>
<?php endif ?>



<?php // Morphemes ?>
<?php if (isset($section_parts->morpheme)): ?>
\subsection {Word Building}
<?php 
  $morpheme_cols = 1;
  $morpheme_count = count($section_parts->morpheme); 
  if ($morpheme_count >= 4) {$morpheme_cols = 4;}
  else {$morpheme_cols = $morpheme_count;} 
?>
<?php echo theme('olctex_columns', array('cols' => $morpheme_cols, 'data' =>
  _olctex_theme_multiple(
    'olctex_bilingual_morpheme', 
    $section_parts->morpheme
  )
)) ?>
<?php endif ?>



<?php // Vocabulary ?>
<?php if (isset($section_parts->word)): ?>
\subsection {Vocabulary}
<?php echo theme('olctex_container', array('data' =>
  _olctex_theme_multiple(
    'olctex_bilingual_word', 
    $section_parts->word
  )
)) ?>
<?php endif ?>



<?php // People ?>
<?php if (isset($section_parts->person)): ?>
\subsection {People}
<?php echo theme('olctex_container', array('data' =>
  _olctex_theme_multiple(
    'olctex_bilingual_person', 
    $section_parts->person
  )
)) ?>
<?php endif ?>



<?php // Places ?>
<?php if (isset($section_parts->place)): ?>
\subsection {Places}
<?php echo theme('olctex_container', array('data' =>
  _olctex_theme_multiple(
    'olctex_bilingual_place', 
    $section_parts->place
  )
)) ?>
<?php endif ?>



<?php // Conjugation ?>
<?php if (isset($section_parts->conjugation)): ?>
\subsection {Conjugations}
<?php echo theme('olctex_container', array('data' =>
  _olctex_theme_multiple(
    'olctex_bilingual_conjugation_container', 
    $section_parts->conjugation
  )
)) ?>
<?php endif ?>



<?php // Phrases ?>
<?php if (isset($section_parts->phrase)): ?>
\subsection {Phrases}
<?php echo theme('olctex_container', array('data' =>
  _olctex_theme_multiple(
    'olctex_bilingual_phrase', 
    $section_parts->phrase
  )
)) ?>
<?php endif ?>



<?php // Sentences ?>
<?php if (isset($section_parts->sentence)): ?>
\subsection {Sentences}
<?php echo theme('olctex_container', array('data' =>
  _olctex_theme_multiple(
    'olctex_bilingual_sentence', 
    $section_parts->sentence
  )
)) ?>
<?php endif ?>



<?php // Conversation ?>
<?php if (isset($section_parts->conversation_turn)): ?>
\subsection {Conversations}
<?php echo theme('olctex_container', array('data' =>
  _olctex_theme_multiple(
    'olctex_bilingual_conversation_container', 
    $section_parts->conversation_turn
  )
)) ?>
<?php endif ?>



<?php // Narrative ?>
<?php if (isset($section_parts->narrative)): ?>
\subsection{Narratives}
<?php echo theme('olctex_container', array('data' =>
  _olctex_theme_multiple(
    'olctex_bilingual_narrative', 
    $section_parts->narrative
  )
)) ?>
<?php endif ?>



<?php // Article (Reading) ?>
<?php if (isset($section_parts->article)): ?>
\subsection{Reading}
<?php echo theme('olctex_container', array('data' =>
  _olctex_theme_multiple(
    'olctex_bilingual_article', 
    $section_parts->article
  )
)) ?>
<?php endif ?>
