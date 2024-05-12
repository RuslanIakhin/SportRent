<div class="row">
    @foreach ($cat_card as $c)
    <div class="col-3 mt-2">
        <a href="{{ route('user_capabilities.category', ['category_id' => $c->id]) }}" class="text-decoration-none text-dark">
            <div class="card cat border-0 rounded-2 text bg-brandgrey">
                <div class="cen">
                    <img src="{{ asset($c->image) }}" class="card-img-top rounded-2 " alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title-cat name text-center">{{ $c->name }}</h5>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>