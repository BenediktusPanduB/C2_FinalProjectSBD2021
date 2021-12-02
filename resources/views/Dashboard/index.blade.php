@extends('main.navbar')

@section('container')

<div class="bg-light p-5 rounded-lg m-3">
  <h1 class="display-4">Hello, {{ auth()->user()->name }} </h1>
  <h2 class="display-6">as {{ auth()->user()->role  }}</h2>
  <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, sit? Dolore amet sunt animi facilis! Aliquid recusandae quos nemo, explicabo molestias assumenda dolores nulla illum voluptas enim! Quo, dolorum facere.</p>
  <hr class="my-4">
  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint quae in ipsa eligendi debitis nesciunt, reiciendis assumenda tempora eius natus recusandae veniam sequi molestias nemo doloribus facere sit alias nam?</p>
</div>
@endsection
