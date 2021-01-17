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
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>日報管理</title>
</head>
<body>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">日報一覧</div>
        <div class="card-body">

            <a href="/create" class="btn btn-primary">新規登録</a>
            <hr>

            <div class="mb-3 font-weight-bold">検索条件を入力してください</div>
            <form action="/search" method="get">@csrf

                <div class="form-group form-inline">
                    <label for="id" class="mr-4">ID</label>
                    <input type="text" class="form-control col-md-1" name="id" value="{{old('id')}}">
                    @if($errors->has('id'))
                        <span
                            class="text-danger">{{$errors->first('id')}}</span>
                    @endif
                </div>
                <div class="form-group form-inline">
                    <label class="mr-2">日付</label>
                    <input class="form-control col-md-2 mr-2" name="from-date"
                           type="date"
                           id="from-date" value="{{old('from-date')}}">
                    〜
                    <input class="form-control col-md-2 ml-2" name="to-date"
                           type="date"
                           id="to-date" value="{{old('to-date')}}">
                </div>
                <div class="form-group">
                    <label for="contents">日報内容</label>
                    <small>※入力した内容を含む日報を検索</small>
                    <input type="text" class="form-control col-md-5"
                           name="contents" value="{{old('contents')}}">
                </div>

                <button type="submit" class="btn btn-primary">検索</button>
                <small>※すべて入力せずに押すと全件表示</small>
            </form>
            <hr>

            <div class="mb-3 font-weight-bold">検索結果 - 日報一覧</div>
            {{--            {{dd($reports)}}--}}
            @if(isset($reports))
                <table class="table table-hover table-sm">
                    <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>日付</th>
                        <th>日報内容</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports['result'] as $report)
                        <tr>
                            <td>{{$report->id}}</td>
                            <td>{{$report->date}}</td>
                            <td>
                                <pre>{{$report->contents}}</pre>
                            </td>
                            <td>
                                <a href="{{route('dailyreports.edit', ['id'=>$report->id])}}"
                                   class="btn btn-link py-0 pr-0 border-0">編集</a>
                                <form method="post"
                                      action="{{route('dailyreports.delete', ['id'=>$report->id])}}"
                                      class="d-inline">@csrf
                                    <button type="submit"
                                            class="btn btn-link py-0 border-0"
                                            id="delete-btn">削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$reports['result']->appends($reports['pager-params'])->links()}}
                    {{--                    {{$reports->appends($params)->links()}}--}}
                    {{--                    {{$reports->appends(request()->query())->links()}}--}}
                    {{--                    {{$reports->appends([--}}
                    {{--                                        'id'=>$id,--}}
                    {{--                                        'from-date'=>$fromDate,--}}
                    {{--                                        'to-date'=>$toDate,--}}
                    {{--                                        'contents'=>$contents--}}
                    {{--                                        ])--}}
                    {{--                               ->links()}}--}}
                </div>
            @else
                <div class="alert alert-primary col-md-5" role="alert">
                    条件に一致する検索結果はありません
                </div>
            @endif
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

<script>
    $(function () {
        $('#delete-btn').on("click", function () {
            let result = window.confirm('削除してもよろしいですか？');
            if (result) {
                $('#delete-btn').submit();
            } else {
                return false;
            }
        });
    });
</script>
</body>
</html>
