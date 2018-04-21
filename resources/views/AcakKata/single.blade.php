@extends('layouts.master')

@section('title', 'Game Acak Kata')
@section('content')


<center><p class="doublecolor">Point: </p></center>
<center>Clue : &nbsp {{ $kata['klue'] }}</center>
	<hr>
	<center>
		<div>
		<form>
			<?php print_r($kata);die; ?>
			 <label for="Kata Acak">Kata Acak</label>
			 	<div class="col-sm-6">
			      <input type="text" class="form-control" value="{{ $kata['kata_acak'] }}" readonly>
			      <input type="hidden" class="form-control" name="id" value="{{ $kata['id'] }}" >
				</div>
			 <label class="control-label col-sm-2" for="Nama Lengkap">Jawaban:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="kata_acak" id="kata_acak"> 
			    </div>  
			      <hr>
			      <input type="submit" value="CEK" id="submit">
		</form>
		</div>
			  		
 	
 	</center>

 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

       <script>

       $(document).ready(function(){
          $("#submit").click(function(){
              console.log("masuk ajax");

              var id_kata = $('.id_input').val();
              var jawaban = $('#jawaban_input').val();

              console.log('id -> ' + id_kata);
              console.log('jawaban -> ' + jawaban);

              $.ajax({
                  type: "POST",
                  url: 'getJawaban',
                  data: {id:id_kata, jawaban:jawaban},
                  success: function(msg) {
                    console.log('result => ' + msg)
                    if(msg == 'benar')
                      $('#result').replaceWith('<div id="result">RESULT BENER</div>');
                    else
                      $('#result').replaceWith('<div id="result">RESULT SALAH</div>');
                  },
                  error: function(msg){
                      alert('something wrong')
                  }
              });
          });

          $(".ganti-kata").click(function(){
              console.log("masuk ajax ganti kata");

              $.ajax({
                  type: "POST",
                  url: 'selectKata',
                  data: {},
                  success: function(msg) {
                    console.log('result => ' + msg)
                    $('#kata-kata').replaceWith('<div id="kata-kata">' + msg.nama_kata + '</div>');
                  },
                  error: function(msg){
                    alert('something wrong')
                  }
              });
          });
      });
    </script>

@endsection