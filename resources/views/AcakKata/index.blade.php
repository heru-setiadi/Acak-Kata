@extends('layouts.master')

@section('title', 'Game Acak Kata')
@section('content')

<center><p class="doublecolor">Point:</p><h3 id="point">0</h3></center>
<center><p id="clue" > Clue : &nbsp {{ $klue }} </p></center>
	<hr>
	<center>
		<div>
		<form>
			 <label for="Kata Acak">Kata Acak</label>
			 	<div id="kata-kata" class="col-sm-6">
			      <input type="text" class="form-control" value="{{ $kata_acak }}" readonly>
			      <input type="hidden" class="form-control" name="id" value="{{ $id }}" id="id" >
				</div>
			 <label class="control-label col-sm-2" for="Nama Lengkap">Jawaban:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="kata_acak" id="kata_acak"> 
			    </div>  
			    <hr>
			    <input type="submit" value="CEK" id="submit"><br>
		</form>
		</div>
 	</center>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       <script>

       $(document).ready(function(){

       	$('#kata_acak').keyup(function(){
		    $(this).val($(this).val().toUpperCase());
		});

          $("#submit").click(function(){
              console.log("masuk ajax");

              var id_kata = $('#id').val();
              var jawaban = $('#kata_acak').val();

              $.ajax({
                  type: "POST",
                  url: 'getJawaban',
                  data: {id:id_kata, jawaban:jawaban},
                  success: function(msg) {
                    console.log('result => ' + msg)
                    if(msg['jawaban'] == 'benar'){
                      alert('yey bener')

                      var point = $('#point').text();
					$('#point').text(parseInt(point) + 10);

				var data = '<div id="kata-kata" class="col-sm-6">' +'<input type="text" class="form-control" value="'+ msg['result']['kata_acak'] +'" readonly>'+
			      '<input type="hidden" class="form-control" name="id" value="'+ msg['result']['id'] +'" id="id" >' + '</div>';

			      $('#kata-kata').replaceWith(data);
			      $('#kata_acak').replaceWith('<input type="text" class="form-control" name="kata_acak" id="kata_acak">');
			      $('#clue').replaceWith('<p id="clue" > Clue : '+ msg['result']['klue'] +' </p>');

			      if(msg['result']['id'] == 'data tidak ada'){
			      	alert('anda sudah selesai :)');
			      	$('#point').text(parseInt(point) + 10);
			      }

			      	$('#kata_acak').keyup(function(){
					    $(this).val($(this).val().toUpperCase());
					});

				} 
                    else{
                      alert('yah salah :(')
                    }
                  },
                  error: function(msg){
                      alert('something wrong')
                  }
              });
          });

          // $(".ganti-kata").click(function(){
          //     console.log("masuk ajax ganti kata");

          //     $.ajax({
          //         type: "POST",
          //         url: 'selectKata',
          //         data: {},
          //         success: function(msg) {
          //           console.log('result => ' + msg)
          //           $('#kata-kata').replaceWith('<div id="kata-kata">' + msg.nama_kata + '</div>');
          //         },
          //         error: function(msg){
          //           alert('something wrong')
          //         }
          //     });
          // });
      });
    </script>

@endsection