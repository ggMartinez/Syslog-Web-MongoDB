<div style="padding: 5px" class="alert alert-{{ $FormatService -> FormatSeverity($event -> Priority)['BootstrapClass'] }}" role="alert">
    {{ $FormatService -> FormatSeverity($event -> Priority)["Text"] }}
</div>