<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col md-12">
                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <input  type="text" class="mt-3 form-control @error('First_Name')
                            is-invalid
                            @enderror" name="First_Name" placeholder="First Name" aria-label="Name">
                            @error('First_Name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <input  type="text" class="mt-3 form-control @error('Last_Name')
                                is-invalid
                            @enderror" name="Last_Name" placeholder="Last Name" aria-label="Email">
                            @error('Last_Name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <input type="text" class="mt-3 form-control" name="Email" placeholder="Email" aria-label="Email">
                            <input type="text" class="mt-3 form-control" name="Phone" placeholder="Phone" aria-label="Phone">

                            <select class="form-select mt-3 @error('company_id')
                                is-invalid
                            @enderror" name="company_id" id="">
                                <option disabled selected>Please Select company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->Name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <button type="submit" class="mt-3 btn btn-info">{{ __('custom.Add') }}</button>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
