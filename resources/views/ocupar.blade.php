@extends('layouts.form')

@section('title', 'Nueva reserva')

@section('form')

@livewire('ocupar-form', ['homecamper_id' => $homecamper->id])

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




@endsection
