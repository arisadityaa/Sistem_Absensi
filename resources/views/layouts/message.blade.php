<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @elseif (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show">
            {{ session()->get('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @elseif (session()->has('danger'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session()->get('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @elseif (session()->has('info'))
        <div class="alert alert-info alert-dismissible fade show">
            {{ session()->get('info') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif
</div>