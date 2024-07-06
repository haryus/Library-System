<script>

var NotyJgrowl = function() {

    var _componentNoty = function() {
        if (typeof Noty == 'undefined') {
            console.warn('Warning - noty.min.js is not loaded.');
            return;
        }

        // Override Noty defaults
        Noty.overrideDefaults({
            theme: 'limitless',
            layout: 'topRight',
            type: 'alert',
            timeout: 4000
        });

        // Error
        @if (count($errors) > 0)
            @foreach($errors->all() as $error)
                 new Noty({
                      text: '{{ $error }}',
                      type: 'error'
                  }).show();
            @endforeach
        @endif

        // Success
        @if (Session::has('success'))
            new Noty({
                text: '{{ Session::get('success') }}',
                type: 'success'
            }).show();
        @endif
    };

    return {
        init: function() {
            _componentNoty();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    NotyJgrowl.init();
});
</script>