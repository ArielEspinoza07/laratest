@if(session()->has('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-with-icon" data-notify="container">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
                <span data-notify="icon" class="tim-icons icon-bell-55"></span>
                <span data-notify="message">{{session()->get('success')}}</span>
            </div>
        </div>
    </div>
@endif
