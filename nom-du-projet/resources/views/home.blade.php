@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tableau de bord</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <ul>
        <li><a href="/leads">Leads</a></li>
        <li><a href="/prospects">Prospects</a></li>
        <li><a href="/clients">Clients</a></li>
    </ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

