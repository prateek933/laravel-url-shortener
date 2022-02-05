<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>{{ trans('app.title') }}</title>
    </head>
    <body>
        <div class="container my-5">
            <div class="row">
                <h1 class="my-2 fs-4 fw-bold text-center">{{ trans('app.title') }}</h1>
                <form action="{{ route('shorten.url') }}" method="POST" class="my-2">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" name="url" class="form-control" placeholder="Enter URL">
                        
                        @error('url')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-outline-secondary" type="submit">{{ trans('app.button-title') }}</button>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ trans('app.id') }}</th>
                            <th>{{ trans('app.url') }}</th>
                            <th>{{ trans('app.short-url') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mappedResources as $key => $record)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $record['url'] }}</td>
                            <td>
                                <a href="{{ 'shorten-url/'.$record['shorten_url_key'] }}">
                                    {{ config('app.url').$record['shorten_url_key'] }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </body>
</html>