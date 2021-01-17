<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <title>日報管理</title>
</head>
<body>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">日報登録</div>
        <div class="card-body">
            <form action="{{ route('dailyreports.register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="date">日付</label>
                    <input class="form-control col-md-2" name="date" type="date"
                           id="date" value="{{old('date')}}">
                    @if($errors->has('date'))
                        <span
                            class="text-danger">{{$errors->first('date')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="contents">日報内容</label>
                    <textarea class="form-control col-md-5" rows="3" name="contents"
                              cols="50"
                              id="contents">{{old('contents')}}</textarea>
                @if($errors->has('contents'))
                        <span
                            class="text-danger">{{$errors->first('contents')}}</span>
                    @endif
                    <div class="invalid-feedback"></div>
                </div>
                <button type="submit" class="btn btn-primary">登録</button>
                <a href="/" class="btn btn-primary">戻る</a>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>
</html>
