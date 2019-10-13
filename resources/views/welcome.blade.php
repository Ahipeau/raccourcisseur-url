
@extends('layouts.master')


@section('content')
    <h1>Votre générateur de URL court</h1>

    
    
    <form action="" method="POST">
        {{ csrf_field() }}
        <input type="text" name="url" placeholder="Enter your original URL" value="{{old('url')}}">
        {!!$errors->first('url', '<p class="error_message">:message</p>')!!}
        {{-- <input type="submit" value="Générer URL"> --}}
    </form>
    <p>Veuillez entrer une url sous ce format "http://www.azerty.com/"</p>




@stop
