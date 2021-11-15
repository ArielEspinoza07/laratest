<div class="row ">
    <div class="col-5 d-flex justify-content-center align-items-center text-white">
        {{__('Showing')}} {{$model->firstItem()}} {{__('of')}} {{$model->lastItem()}}
    </div>
    <div class="col-6 d-flex justify-content-start align-items-center">
        <ul class="pagination m-0 d-flex align-items-center">
            <li class="page-item previous rounded-pill mr-2 {{empty($model->previousPageUrl()) ? 'disabled' : ''}}">
                <a class="page-link d-flex align-items-center"  href="{{$model->previousPageUrl()}}">Previous</a>
            </li>
            <li class="page-item active rounded-circle mr-2 ">
                <a class="page-link d-flex align-items-center" href="#">{{$model->currentPage()}}</a>
            </li>
            <li class="page-item next rounded-pill {{empty($model->nextPageUrl()) ? 'disabled' : ''}}">
                <a class="page-link d-flex align-items-center"  href="{{$model->nextPageUrl()}}">Next</a>
            </li>
        </ul>
    </div>
</div>
