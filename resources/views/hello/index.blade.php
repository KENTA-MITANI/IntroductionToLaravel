@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>{{ $msg }}</p>
    @if (count($errors) > 0)
    <p>入力に問題があります。再入力してください。</p>
    @endif
    <form actoin="/hello" method="post">
        <table>
            @csrf
            @if ($errors->has('name'))
            <tr><th>ERROR</th><td>{{ $errors->first('name') }}</td></th></tr>
            @endif
            <tr><th>name: </th><td><input type="text" name="name" value="{{ old('mail') }}"></th></tr>
            @if ($errors->has('mail'))
            <tr><th>ERROR</th><td>{{ $errors->first('mail') }}</td></th></tr>
            @endif
            <tr><th>mail: </th><td><input type="text" name="mail" value="{{ old('mail') }}"></td></th></tr>
            @if ($errors->has('age'))
            <tr><th>ERROR</th><td>{{ $errors->first('age') }}</td></th></tr>
            @endif
            <tr><th>age: </th><td><input type="text" name="age" value="{{ old('age') }}"></td></th></tr>
            <tr><th></th><td><input type="submit" vlaue="send"></td></tr>
        </table>
    </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection