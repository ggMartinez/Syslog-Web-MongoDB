@include('layouts.header')
    
    @if(is_null(Request::get('host')))
        <h3>All Logged events</h3>
    @else 
        <h3>"{{ Request::get('host')}}" Logged events</h3>
    @endif

    @include("components.eventList")




@include('layouts.footer')