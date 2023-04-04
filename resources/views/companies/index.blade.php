<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success')}}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-11"></div>
            <div class="col-md-1 end">

                <a class="btn btn-success" href="{{ route('companies.create') }}">{{ __('custom.Create') }}</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('custom.Name') }}</th>
                    <th scope="col">{{ __('custom.Email') }}</th>
                    <th scope="col">{{ __('custom.Logo') }}</th>
                    <th scope="col">{{ __('custom.Website') }}</th>
                    <th scope="col">{{ __('custom.Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $key => $company)
                        <tr>
                            <th scope="row">{{ $companies->firstItem() + $key }}</th>
                            <td>{{ $company->Name }}</td>
                            <td>{{ $company->Email }}</td>
                            <td>
                                @if ($company->Logo != null)
                                    <img src="{{ asset('storage/images/'.$company->Logo) }}" width="100" height="100" alt="">
                                @else
                                    <img src="https://placehold.jp/100x100.png" width="100" height="100" alt="">
                                @endif
                            </td>
                            <td>{{ $company->Website }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('companies.edit', $company->id) }}">{{ __('custom.Edit') }}</a>
                            </td>
                            <td>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: red" class="btn btn-danger">{{ __('custom.Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                {{ $companies->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

