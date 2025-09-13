<x-layout title="Series">
    <a href="{{ route('series.create') }}" class="btn btn-dark">Adicionar nova Serie</a>
    <ul class="list-group">
        @foreach($series as $serie)
            <li class = "list-group"> {{ $serie -> nome }} </li>
            <!--'[]'= sinxtaxe de array, '->' sintaxe objeto .... -->
        @endforeach
    </ul>
</x-layout>
