@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <h1>Welcome to the Mensa Bot</h1>
    <ul class="list-group">
    @foreach ($menus as $menu)
    	<li class="list-group-item">
    		{{ $menu->name }} <span class="badge">{{ $menu->date->diffForHumans() }}</span>
    		<br> <small>{{ $menu->cafeteria->name }}</small>
    	</li>
    @endforeach
    </ul>

    {{ $menus->links() }}
@endsection