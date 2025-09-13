<x-layout title="Nova Serie">
    <form action="{{ route('series.store')  }}" method="post">
        @csrf <!--EVITAR ERRO 419-->
        <div class="mb-3">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>

