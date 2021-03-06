<div class="row">
    {{ Form::label('restaurant_img', 'Photo du restaurant', ['class' => 'col-md-12 control-label']) }}

    <div class="col-md-12">
        <div class="file-drop-area">
            <span class="fake-btn">Choisir un fichier</span>
            <span class="file-msg js-set-number">ou déposez-le ICI</span>
            {{ Form::file('add_picture', ['class' => 'file-input']) }}
        </div>

        @if ($errors->has('restaurant_img'))
            <p class="help-block">
            <span class="help-block">
                <strong>{{ $errors->first('restaurant_img') }}</strong>
            </span>
            </p>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12 all__pictures"></div>
    <div class="col-md-12 current__pictures">
        <hr>
        @foreach($pictures as $picture)
            <div class="col-md-4 current__pictures-div">
                {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['delete_picture', $picture->id],
                    'class' => 'form-horizontal delete__picture-form'
                ]) !!}
                    <button class="delete__picture-btn" type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
                {!! Form::close() !!}
                <img src="{{ asset($picture->path) }}" class="img-responsive"/>
            </div>
        @endforeach
    </div>
</div>
