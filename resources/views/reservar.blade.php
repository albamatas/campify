@extends('layouts.form')

@section('title', 'Reservar zona campify')

@section('form')

@livewire('reservar-form', ['homecamper_id' => $homecamper->id])

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
