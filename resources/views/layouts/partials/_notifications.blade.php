<div class="row">
  <div class="col-md-6 col-md-offset-3">
      @if (Session()->has('error'))
        <div class="alert alert-danger">
          {{ session()->get('error') }}
        </div>
      @endif

      @if (Session()->has('info'))
        <div class="alert alert-info">
          {{ session()->get('info') }}
        </div>
      @endif

  </div>
</div>
