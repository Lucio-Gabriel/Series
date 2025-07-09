<x-layout title="Series">

<a href="{{ route('series.create') }}">Adicionar</a>

@foreach ($series as $series)
    <ul>{{ $series }}</ul>
@endforeach

</x-layout>
