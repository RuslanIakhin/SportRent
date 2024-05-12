<div class="row">
    @foreach ($items as $i)
    <div class="modal fade" id="rental-{{ $i->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title text-rob-med-22" id="exampleModalLabel">Аренда</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-rob-20"><strong>{{ $i->name }}</strong></div>
                    <div class="text-rob-20 mt-1"><strong>Цена: </strong>{{ $i->price }} ₽ в день</div>
                    <div class="text-rob-20 mt-1"><strong>Залог: </strong>{{ $i->deposit }} ₽</div>
                    <div class="text-rob-20 mt-1"><strong>Город: </strong>{{ $i->city }}</div>
                    <div class="text-rob-20 mt-1"><strong>Занят в следующие даты: </strong>
                        <div class="text-rob">6.06.2023 - 12.06.2023</div>
                        <div class="text-rob">6.06.2023 - 12.06.2023</div>
                    </div>
                    <div class="input-group mt-2">
                        <input type="date" class="form-control rounded-2 text-rob" name="date1" id="date1Input" placeholder="ФИО">
                        <span id="date1Error" class="invalid-feedback"></span>
                    </div>
                    <div class="input-group mt-2">
                        <input type="date" class="form-control rounded-2 text-rob" name="date2" id="date2Input" placeholder="ФИО">
                        <span id="date2Error" class="invalid-feedback"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-brandgreen text-rob">Войти</button>
                    <button type="button" class="btn btn-branddark text-rob" data-bs-dismiss="modal">Закрыть</button>
                </div>   
            </div>
        </div>
    </div>
    
    <div class="col-3 mt-1">
        <div class="card border-0 rounded-2">
            <div class="lvl bg-white rounded-2">
                <a href="{{ route('user_capabilities.item', ['item_id' => $i->id]) }}" class="text-decoration-none text-dark">
                    <img src="{{ asset($i->image) }}" class="card-img-top rounded-2" alt="">
                    <div class="card-body">
                        <h5 class="card-title name ">{{ $i->name }}</h5>
                        <h5 class="card-title">{{ $i->price }} ₽ в день</h5>
                        <p class="card-text text-rob-18"><strong>Город:</strong> {{ $i->city }}</p>
                    </div>
                </a>
                <div class="card-body pt-0">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#rental-{{ $i->id }}" class="btn btn-brandgreen btn-card"><div class="text-rob-18">Арендовать</div></button>
                </div>   
            </div>
        </div>
    </div>
    @endforeach
</div>
