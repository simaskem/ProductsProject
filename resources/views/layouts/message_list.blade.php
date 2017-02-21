@if(Session::has('flash_message'))
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            </div>
        </div>
    </div>
@endif
@if(Session::has('flash_message_danger'))
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    {{ Session::get('flash_message_danger') }}
                </div>
            </div>
        </div>
    </div>
@endif