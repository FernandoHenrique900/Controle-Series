<x-layout title="Series">
    <a href="{{ route('series.create') }}" class="btn btn-dark">Adicionar nova Serie</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso  }}
    </div>
    @endisset
    
    <ul class="list-group">
        @foreach($series as $serie)
            <li class = "list-group-item d-flex justify-content-between align-items-center">
                 {{ $serie -> nome }} 
                 <form action="{{ route ('series.destroy', $serie->id) }}" method="post">
                    @csrf  <!--EVITAR ERRO 419-->
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"> X </button>
                 </form>
                </li>
            <!--'[]'= sinxtaxe de array, '->' sintaxe objeto .... -->
        @endforeach
    </ul>
</x-layout>
