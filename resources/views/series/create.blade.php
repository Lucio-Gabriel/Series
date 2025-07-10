<x-layout title="Nova Série">
    <form action="/series/save" method="POST">
        @csrf
        <label
            for="nome"
            class="form-label"
        >
            Nome:
        </label>

        <input
            type="text"
            id="name"
            class="form-control"
            name="name"
        />

        <button type="submit" class="btn btn-primary mt-2">
            Salvar      
        </button>
    </form>
</x-layout>
