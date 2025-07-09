<x-layout title="Series">

    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2" >Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $series)
            <li class="list-group-item">{{ $series }}</li>
        @endforeach
    </ul>

</x-layout>
