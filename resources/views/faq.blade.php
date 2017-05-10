 @extends('layouts.profile')

 @section('title', 'EBook | FAQ')

 @section('content')
 <div class="panel-group" id="faqAccordion">
  <div class="panel panel-default ">
    <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
     <h4 class="panel-title">
      <a href="#" class="ing">Як добавити свою книгу на сайт?</a>
    </h4>

  </div>
  <div id="question0" class="panel-collapse collapse" style="height: 0px;">
    <div class="panel-body">
     <h5><span class="label label-primary">Відповідь</span></h5>

     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, velit, vitae sequi autem itaque consectetur incidunt harum hic consequuntur, est ut molestiae suscipit dolorem delectus animi maiores quas dicta, nemo?</p>
   </div>
 </div>
</div>
<div class="panel panel-default ">
  <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
   <h4 class="panel-title">
    <a href="#" class="ing"></a>
  </h4>

</div>
<div id="question1" class="panel-collapse collapse" style="height: 0px;">
  <div class="panel-body">
   <h5><span class="label label-primary">Відповідь</span></h5>

   <p></p>
 </div>
</div>
</div>
<div class="panel panel-default ">
  <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
   <h4 class="panel-title">
    <a href="#" class="ing"> </a>
  </h4>

</div>
<div id="question2" class="panel-collapse collapse" style="height: 0px;">
  <div class="panel-body">
   <h5><span class="label label-primary">Відповідь</span></h5>

   <p></p>
 </div>
</div>
</div>
<div class="panel panel-default ">
  <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
   <h4 class="panel-title">
    <a href="#" class="ing"> </a>
  </h4>

</div>
<div id="question3" class="panel-collapse collapse" style="height: 0px;">
  <div class="panel-body">
   <h5><span class="label label-primary">Відповідь</span></h5>

   <p></p>
 </div>
</div>
</div>

</div>
<!--/panel-group-->
@endsection