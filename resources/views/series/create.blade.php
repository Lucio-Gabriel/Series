<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome:</label>
                <input
                    autofocus
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                />
            </div>

            <div class="col-2">
                <label for="seasonsQty" class="form-label">N temporadas:</label>
                <input
                    type="text"
                    id="seasonsQty"
                    name="seasonsQty"
                    class="form-control"
                    value="{{ old('seasonsQty') }}"
                />
            </div>

            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
                <input
                    type="text"
                    id="episodesPerSeason"
                    name="episodesPerSeason"
                    class="form-control"
                    value="{{ old('episodesPerSeason') }}"
                />
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2">
            Salvar
        </button>
    </form>

</x-layout>
