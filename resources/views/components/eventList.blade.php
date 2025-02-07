    @inject("FormatService", "App\Services\FormatService")
    
    <hr class="bg border-2 border-top border" />

    @if($Events === null || count($Events) === 0)
        <br>
        <h3>No events found.</h3>
    @else

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Severity</th>
                    <th>Date</th>
                    <th>Host</th>
                    <th>Syslog Tag</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Events as $event)
                    <tr>
                        <td>@include("components.eventFields.priority")</td>
                        <td>@include("components.eventFields.date")</td>
                        <td>@include("components.eventFields.host")</td>
                        <td>@include("components.eventFields.syslogTag")</td>
                        <td class="cell-wrap">@include("components.eventFields.message")</td>


                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $Events->links() }}
        <br> <br>
        <hr class="bg border-2 border-top border" />

    @endif
