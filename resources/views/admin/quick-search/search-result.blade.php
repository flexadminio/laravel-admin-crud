<p class="italic">There are {{ $searchResults->count() }} results.</p>

@foreach($searchResults->groupByType() as $type => $modelSearchResults)
  <div class="uppercase mt-3">{{ $type }}</div>

  @foreach($modelSearchResults as $searchResult)
    <div class="list-group list-group-flush">
      <a class="list-group-item text-highlight ps-0" href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>
    </div>
  @endforeach
@endforeach
