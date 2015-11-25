
<h2>{{node.title}}</h2>
<div><img src="http://textbook.olc.edu/api/file/{{node.field_picture.und.0.fid}}" style="max-width:100px; max-height:100px" /></div>

{{#section_parts._mz.lesson.isDefined}}
<div id="lesson" class="booklet-part">
  <h3 class="heading">Lessons</h3>
  <div class="content">
    {{#section_parts.lesson}}
      <div>{{{node.body.und.0.safe_value}}}</div>
    {{/section_parts.lesson}}
  </div>
</div>
{{/section_parts._mz.lesson.isDefined}}

{{#section_parts._mz.morpheme.isDefined}}
  <div id="morpheme" class="booklet-part">
    <h3 class="heading">Morphemes</h3>
    <div class="content">
      {{#section_parts.morpheme}}
        <span>{{{node.field_morpheme.und.0.safe_value}}}</span>
      {{/section_parts.morpheme}}
    </div>
  </div>
{{/section_parts._mz.morpheme.isDefined}}

{{#section_parts._mz.word.isDefined}}
  <div id="word" class="booklet-part">
    <h3 class="heading">Vocabulary</h3>
    <div class="content">
      {{#section_parts.word}}
        <div>{{{node.field_word.und.0.safe_value}}}</div>
      {{/section_parts.word}}
    </div>
  </div>
{{/section_parts._mz.word.isDefined}}

<hr />
<h2>Too be done</h2>

{{#section_parts.name}}
<div>PERSON</div>
{{/section_parts.name}}

{{#section_parts.conjugation}}
<div>CONJUGATION</div>
{{/section_parts.conjugation}}

{{#section_parts.phrase}}
<div>PHRASE</div>
{{/section_parts.phrase}}

{{#section_parts.sentence}}
<div>SENTENCE</div>
{{/section_parts.sentence}}

{{#section_parts.conversation_turn}}
<div>CONVERSATION TURN</div>
{{/section_parts.conversation_turn}}

{{#section_parts.narrative}}
<div>NARRATIVE</div>
{{/section_parts.narrative}}

{{#section_parts.article}}
<div>ARTICLE</div>
{{/section_parts.article}}

