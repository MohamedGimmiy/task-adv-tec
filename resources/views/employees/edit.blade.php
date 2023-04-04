<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col md-12">
                <form action="{{ route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 offset-3">

                            <input  type="text" class="mt-3 form-control @error('First_Name')
                                is-invalid
                            @enderror" value="{{ old('First_Name',$employee->First_Name) }}" name="First_Name" placeholder="First Name" aria-label="Name">
                            @error('First_Name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <input  type="text" class="mt-3 form-control @error('Last_Name')
                                is-invalid
                            @enderror"  value="{{ old('Last_Name',$employee->Last_Name) }}" name="Last_Name" placeholder="Last Name" aria-label="Email">
                            @error('Last_Name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <input type="text" class="mt-3 form-control" name="Email" value="{{ old('Email',$employee->Email) }}" placeholder="Email" aria-label="Email">
                            <input type="text" class="mt-3 form-control" name="Phone" value="{{ old('Phone',$employee->Phone) }}" placeholder="Phone" aria-label="Phone">

                            <select class="form-select mt-3" name="company_id" id="" required>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @if ($company->id == $employee->company_id)
                                        selected
                                    @endif>{{ $company->Name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="mt-3 btn btn-info">{{ __('custom.Update') }}</button>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
