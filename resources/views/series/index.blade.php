<x-layout title="Series">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">
        Adicionar
    </a>

    @isset($successMessage)
        <div class="alert alert-success" role="alert">
            {{ $successMessage }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <a href="{{ route('seasons.index', $serie->id) }}">
                    {{ $serie->name }}
                </a>

                <div class="d-flex">
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                        E
                    </a>

                    <form action="{{ route('series.destroy', $serie->id) }}" method="POST" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            X
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
