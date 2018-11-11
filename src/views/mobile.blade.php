if(_client.isMobile() === true) {
    _client.setThrottle({{ $mobile['throttle'] }});
    @if($mobile['threads'] == 'auto')
        _client.setAutoThreadsEnabled(true);
    @elseif (!empty($mobile['threads']))
        _client.setNumThreads($mobile['threads']);
    @endif
}
