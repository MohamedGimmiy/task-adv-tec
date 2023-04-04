<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col md-12">
                <form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <input type="text" class="mt-3 form-control @error('Name')
                            is-invalid
                            @enderror" value="{{ old('Name',$company->Name) }}" name="Name" placeholder="Name" aria-label="Name">
                            @error('Name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <input type="text" class="mt-3 form-control" value="{{ old('Email',$company->Email) }}" name="Email" placeholder="Email" aria-label="Email">
                            <input type="text" class="mt-3 form-control" value="{{ old('Website',$company->Website) }}" name="Website" placeholder="Website" aria-label="Website">
                            <input type="file" class="mt-3 form-control" name="Logo" placeholder="Upload" aria-label="Logo">

                            <button type="submit" class="mt-3 btn btn-info">{{ __('custom.Update') }}</button>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
