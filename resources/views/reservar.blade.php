@extends('layouts.form')

@section('title', 'Reservar zona campify')

@section('form')

@livewire('reservar-form', ['homecamper_id' => $homecamper->id])

@endsection
