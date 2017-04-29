{{-- DELETE OR MOVE THIS VIEW FROM THE ROOT --}}

<script>var chartData = [];</script>

@foreach ($activities as $activity)

    <div class="day">
        <h3>{{ $activity->activity->activity_name }} - {{ $activity->date }}</h3>
        <p><strong>Cals burned:</strong> {{ $activity->cals_burned }}</p>
    </div>

    <script>chartData.push({{ $activity }});</script>
@endforeach