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

                <a class="btn btn-success" href="{{ route('employees.create') }}">{{ __('custom.Create') }}</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('custom.FirstName') }}</th>
                    <th scope="col">{{ __('custom.LastName') }}</th>
                    <th scope="col">{{ __('custom.CompanyName') }}</th>
                    <th scope="col">{{ __('custom.Email') }}</th>
                    <th scope="col">{{ __('custom.Phone') }}</th>
                    <th scope="col">{{ __('custom.Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $key => $employee)
                        <tr>
                            <th scope="row">{{ $employees->firstItem() + $key }}</th>
                            <td>{{ $employee->First_Name }}</td>
                            <td>{{ $employee->Last_Name }}</td>
                            <td>{{ $employee->company->Name }}</td>

                            <td>{{ $employee->Email }}</td>
                            <td>{{ $employee->Phone }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('employees.edit', $employee->id) }}">{{ __('custom.Edit') }}</a>
                            </td>
                            <td>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
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

                {{ $employees->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

