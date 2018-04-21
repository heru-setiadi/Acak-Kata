@extends('layouts.master')

@section('title', 'Game Acak Kata')
@section('content')

<!-- @foreach($kata as $a) -->
<center><p class="doublecolor">Point: </p></center>
<center><p class="double">Selamat Datang di Game Acak Kata</p></center>
<li>

	<a href="/AcakKata/{{$a->id}}">SOAL {{ $a->id }}</a>
		<form action="/AcakKata/{{$a['id']}}" method="post">
		<!-- {{ csrf_field() }} -->
		<input type="hidden" name="_method" value="DELETE">
		

	</form>

</li>
</div>
<!-- @endforeach -->
<!-- {{$blog->render()}}  -->
@endsection	