<h1>Last 10 Draw Results</h1>

<ul style="display: flex; flex-wrap: wrap; list-style: none">
    @foreach($last10DrawResults as $result)
        <li style="width: 15%; margin: 10px; padding: 10px; border: 1px solid">
            {{ $result->is_winner ? 'WIN' : 'LOSE' }} <br>
            Engine: {{ implode(',', $result->lotto_engine_numbers) }} <br>
            User: {{ implode(',', $result->user_generated_numbers) }} <br>
            Matched Numbers: {{ implode(',', $result->matched_numbers) }} <br>
            Draw Time: {{ $result->draw_time }}
        </li>
    @endforeach
</ul>

<hr>

<h2>Play Lotto Games</h2>

@foreach($lottoGames as $game)
    <form method="post" action="{{ route('lotto.play', ['mainSetSize' => $game['mainSetSize'], 'ballsDrawn' => $game['ballsDrawn']]) }}">
        @csrf
        <button type="submit">Play Lotto Game ({{ $game['mainSetSize'] }} balls, {{ $game['ballsDrawn'] }} drawn)</button>
    </form>
@endforeach
@if(!empty($lastResult))
    <div>
        <h1>Lotto Draw Result</h1>

        <p>Engine Numbers: {{ implode(', ', $lastResult['lotto_engine_numbers']) }}</p>
        <p>User Numbers: {{ implode(', ', $lastResult['user_generated_numbers']) }}</p>
        <p>Matched Numbers: {{ implode(', ', $lastResult['matched_numbers']) }}</p>

        @if ($lastResult['is_winner'])
            <p>Congratulations! You WIN!</p>
        @else
            <p>Sorry, you LOSE.</p>
        @endif

        <p>Draw Time: {{ $lastResult['draw_time'] }}</p>
    </div>
@endif
