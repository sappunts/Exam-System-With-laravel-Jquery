<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- CSS -->
        <link href="css/app.css" rel="stylesheet">
        <!-- JS -->
    </head>
    <body>
    	
        <div class="container" style="border-color: #C0C0C0">
        <div align="center">
        	<h2><span id=result></span></h2>
        </div>
       <form method="post">
       @foreach ($Proposition as $Propositions)
       <fieldset>
  <p><h4>{{ $Propositions->propositions }}</h4></p>
    <label class="radio">
      <input type="radio" id="answer_{{ $Propositions->id }}" name="answer_{{ $Propositions->id }}" value="1">{{ $Propositions->answer_1 }}
    </label>
    <label class="radio">
      <input type="radio" id="answer_{{ $Propositions->id }}" name="answer_{{ $Propositions->id }}" value="2">{{ $Propositions->answer_2 }}
    </label>
    <label class="radio">
      <input type="radio" id="answer_{{ $Propositions->id }}" name="answer_{{ $Propositions->id }}" value="3">{{ $Propositions->answer_3 }}
    </label>
    <label class="radio">
      <input type="radio" id="answer_{{ $Propositions->id }}"  name="answer_{{ $Propositions->id }}" value="4">{{ $Propositions->answer_4 }}
    </label>
    <label>
    <span id="true_{{ $Propositions->id }}"></span>
    </label>
    </fieldset>
  @endforeach
      <button type="submit" id="submit" class="btn btn-primary btn-lg">ส่งคำตอบ</button>
    <input type="hidden" name="_token" id="csrf" value="{{{ csrf_token() }}}" />
  </form>
  <button type="submit" id="NewExam" class="btn btn-primary btn-lg" style="display: none" onClick="window.location.reload()">ทำใหม่</button>
</div>
    </body>
</html>
<script src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">


	$(function(){
	$('#submit').click( function() {
		event.preventDefault();
		var answer_1 = $("#answer_1:checked").val()
		var answer_2 = $("#answer_2:checked").val()
		var answer_3 = $("#answer_3:checked").val()
		var answer_4 = $("#answer_4:checked").val()
		var answer_5 = $("#answer_5:checked").val()
		if( typeof(answer_1) == "undefined" || typeof(answer_2) == "undefined" || typeof(answer_3) == "undefined" || typeof(answer_4) == "undefined" || typeof(answer_5) == "undefined")
		{
			alert("กรุณาตอบคำถามให้ครบทุกข้อ")
			e.stopPropagation()
		}
		$.ajax({
			url: 'exam/check',
			headers: { 'X-CSRF-TOKEN': {!! json_encode(csrf_token()) !!}},
			type: 'post',
			data: {answer_1: answer_1, answer_2: answer_2, answer_3: answer_3 ,answer_4: answer_4, answer_5: answer_5},
			success: function (data){
				var data = $.parseJSON(data)
				$('#result').html("คุณทำได้ "+data.Score+" คะแนน จาก 5 คะแนน")
				$('#true_1').html("คำตอบที่ถูกต้องคือข้อ "+data.AnswerList[0])
				$('#true_2').html("คำตอบที่ถูกต้องคือข้อ "+data.AnswerList[1])
				$('#true_3').html("คำตอบที่ถูกต้องคือข้อ "+data.AnswerList[2])
				$('#true_4').html("คำตอบที่ถูกต้องคือข้อ "+data.AnswerList[3])
				$('#true_5').html("คำตอบที่ถูกต้องคือข้อ "+data.AnswerList[4])
				$("#submit").hide()
				$('#NewExam').toggle();
			}
		})
	})
});

</script>
